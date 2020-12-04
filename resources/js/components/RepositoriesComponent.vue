<template>
    <div class="animate__animated animate__fadeIn">
        <div class="container-centered">
        <img :src="avatar" :alt="username" class="avatar">
            <div class="input-container">
                 <input class="search-input" v-model="search" type="text">
                 <button class="btn-black btn-search" ><span class="material-icons">search</span></button>
            </div>
        </div>
       <span class="bar-horizontal"></span>
        <div class="container-centered d-colum"> 
          <div v-for="repo in this.searchResults" :key="repo.id" class="repo-container animate__animated animate__fadeIn" >
              <h4>{{repo.name}}</h4>
              <p class="description"  >{{repo.description}}</p>
              <a href="" @click.prevent="gitDeploy(repo.name)" class="btn-black btn-md btn-deploy">Deploy</a>
              <a target="_blank" :href="repo.html_url" class="btn-gray btn-md btn-deploy">Look At</a>
          </div>
        </div>
        <notifications group="foo" position="bottom left" width="215"/>
    </div>
</template>

<script>

export default {
    props:['username','avatar'],
    data(){
        return{
            user:null,
            repositories:[],
            search:'',
            csrfToken:null
        }
    },
    mounted(){
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        axios.get(`https://api.github.com/users/${this.username}/repos`)
                .then((resp)=>{
                    this.repositories=resp.data;
                })
                .catch((err)=>{
                    console.error('Problema con la api'+err);
                });
    },
    computed:{
        searchResults:function(){
            if(this.search.trim()===''&& this.repositories.length>0){
                return this.repositories;
            }else{
                return this.repositories.filter(rep=>rep.name.toLowerCase().includes(this.search.toLowerCase()));
            }
        }
    },
    methods:{

        gitDeploy(repositorie){
            axios.post('/git/deploy',{repositorie:repositorie},{headers:{ "X-CSRF-TOKEN":this.csrfToken}}).then(resp=>{this.notification()});
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
 .container-centered{
    display: flex;
    justify-content: center;
        .avatar{
            width: 150px;
            border-radius: 50%;
            margin-bottom: 1rem;
            min-height: 150px;
        }
    }
  .container-centered.d-colum{
      text-align: center;
      flex-wrap: wrap;
      width: 100%;
      justify-content:space-evenly;
      min-height: 600px;
  }  

  .repo-container{
      width: 45%;
      padding: 1rem;
      margin-top: 2rem;
      background-color: white;
      border-radius: 10px;
      max-height: 140px;
      border: 1px solid rgba($color: #858383, $alpha: 0.2);
  }

  .btn-deploy{
      display: inline-block;
      margin-top: .8rem;
  }

  .description{
      margin-top: .5rem;
      color: lightgray;
  }
  h4{
      text-transform: uppercase;
  }

  .btn-search{
     padding: 5px 8px;  
     span{
         font-size: 16px;
     }
  }
  .search-input{
      padding: 3px 8px; 
 
      font-size: 18px; 
      outline: none;
      border: 1px solid rgba($color: #bebbbb, $alpha: .3);
  }

  .input-container{
     position: absolute;
     right:6rem;
  }
//custom notification

.custom-noti{
  padding: 10px;
  margin: 0 5px 5px;

  font-size: 12px;

  color: #ffffff;
  background: #44A4FC;
  border-left: 5px solid #187FE7;

 

  &.success {
    background: #68CD86;
    border-left-color: #42A85F;
  }
}


</style>
