<template>
    <div class="container">       
       
       <single-project-component v-for="project in projects" :key="project.id" :name="project.title" :description="project.description" :url="project.url" :id="project.id" ></single-project-component>   

        <form action="upload/project" class="dropzone form-drop animate__animated animate__fadeIn" id="my-awesome-dropzone" name="uploadFile" >
          <span id="tmp-path"></span>
        </form>

        <div class="animate__animated animate__fadeInLeft">
            <h3 id="message">{{message}}</h3>
        </div>
        <notifications group="foo" position="bottom left" width="215"/>
    </div>
</template>

<script>
import SingleProjectComponent from './SingleProjectComponent.vue'
    
    export default {
        
        components: { SingleProjectComponent },

        data() { return { 
            projects:[],
            csrfToken:null,
            message:""
         }},

        mounted() {
         
         this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
         const global=this;

         Dropzone.options.myAwesomeDropzone = {
            dictDefaultMessage:'Drap and Drop your Build Folder',
            timeout:180000,
            parallelUploads:1,
            headers:{
                "X-CSRF-TOKEN":this.csrfToken,
            },
            
            init: function() {

                this.on("sending",async function(file) {
                    document.getElementById('tmp-path').innerHTML=`<input type="hidden" name="path" value="${file.fullPath}" />`;
                    global.message="Deploying...";
                }); 

                this.on("complete", function(file) {
                    this.removeFile(file);
                  
                }); 

                this.on("queuecomplete", function (file) {
                    global.message='';
                    global.notification();
                    global.sessionClear();
                    global.getProjects();
                });

                this.on("error", function(file,errorMessage,xhr)
                {
                   
                });
                
            },
        
            };

            this.getProjects();

        },

        methods:{

            sessionClear(){
                axios.post('session/clear').then(resp=>console.log("session cleaned"));
            },

            getProjects(){
                axios.post('get/projects').then(resp=>this.projects=resp.data);
            },
            notification(){
                this.$notify({
                group: 'foo',
                title: 'Successful Deployment!',
                text: 'Now you can see your website, in your list of projects',
                type:'success'
                });
           }


        }
    }
</script>

<style lang="scss" scoped>
    .form-drop{
        margin: 1rem 0 1rem 0;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px dashed rgba($color: #807f7f, $alpha: .3);
        border-radius: 10px;
    }

    #message{
        color: seagreen;
        font-weight: 200;
    }
</style> 



