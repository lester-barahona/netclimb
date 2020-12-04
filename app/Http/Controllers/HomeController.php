<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use GitDownload;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('projects');
    }



    public function repositoriesList()
    {
        return view('repositories');
    }

    public function news()
    {
       return view('news');
    }


    public function uploadProject(Request $request)
    {   
        session_start();

        $ds = DIRECTORY_SEPARATOR;
        $storeFolder = '../../';
         
        if (!empty($_FILES)) {
             
            $tempFile = $_FILES['file']['tmp_name'];

            if(!isset($_SESSION["subdomain"])){ //si no existe lo crea
                $_SESSION["subdomain"] =$this->getRandNameSite().Str::random(6);  
                $url=$_SESSION["subdomain"];
               
                $project=new Project();
                $project->user_id=Auth()->user()->id;
                $project->title=$url;
                $project->description='This is a new project, you can visit and manage it.';
                $project->url='https://'.$url.'.netclimb.test';
                $project->save();
            }
             
            $firstSlaPos=strpos($_POST['path'],'/');
    
            $fullPath = $storeFolder.rtrim($_SESSION["subdomain"].'.netclimb'.substr($_POST['path'],$firstSlaPos), "/.");
            
            $folder = substr($fullPath, 0, strrpos($fullPath, "/"));
            
            if (!is_dir($folder)) {
                $old = umask(0);
                mkdir($folder, 0777, true);
                umask($old);
            }    
            
            if (move_uploaded_file($tempFile, $fullPath)) {
                die($fullPath);
            } else {
                die('e');
            }
        }
        
    }


    public function sessionClear(Request $request)
    {
        session_start();
        session_unset();
        session_destroy();
       
    }

    private function getRandNameSite(){
        $list=["andra","briseida","caliope","neferet","uxia","yelina","zenda"];
        return $list[rand(0,count($list))];
    }


    public function getProjects()
    {
       $projects= User::find(Auth()->user()->id)->projects;
       return response()->json($projects);
    }

    public function gitDeploy(Request $request)
    {
        $url=$this->getRandNameSite().Str::random(6);
        $git = new GitDownload('../../',$url.'.netclimb');

        $author     = Auth()->user()->username;
        $repository = $request->repositorie;
        $branch     = 'main';

        $git->clone($author, $repository, $branch);

        $project=new Project();
        $project->user_id=Auth()->user()->id;
        $project->title=$url;
        $project->description='This is a new project, you can visit and manage it.';
        $project->url='https://'.$url.'.netclimb.test';
        $project->save();

       
    }
    
    
    function projectConfig($id)
    {
        $project= Project::findOrFail($id);
        return view('projectconfig',compact('project'));
    }

    function projectUpdate(Request $request){
        $project= Project::findOrFail($request->input('id'));
        $project->description=$request->input('description');
        $project->save();
    }

    function projectDelete($id){
        $project= Project::findOrFail($id);
        $project->delete();
    }

    public function showProfile()
    {
        return view('profile');
    }
   



}
