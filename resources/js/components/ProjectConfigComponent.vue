<template>
    <div class="animate__animated animate__fadeIn">
        <div class="container-centered">
            <div>
                 <img src="/img/default.jpg"  class="avatar">
                 <h3 class="project-title">{{title}}</h3>
            </div>
       
            <div class="input-container">
                 <button class="btn-red btn-search" @click="showModal()" ><span class="material-icons">delete</span></button>
            </div>
        </div>
       <span class="bar-horizontal"></span>

       
           <form action="" class="form" method="POST">
               <input type="text" name="name"  :value="title" disabled >
               <vue-editor v-model="descrip">{{description}}</vue-editor>
               <button class="btn-black btn-md btn-save" type="button" @click="updateData()"><span class="material-icons">save</span></button>
           </form>
    
        
        <notifications group="foo" position="bottom left" width="215"/>
         <modal name="delete">
             <div class="modal-container">
                <h2 class="model-title">Are you sure to delete {{title}}?</h2>
                <p class="modal-text">This action cannot be undone. This will permanently delete the <strong>{{title}} </strong> project.</p>
                <p>Please type <strong>{{title}}</strong> to confirm.</p>
                <div class="verification-container">
                    <input type="text" v-model="verification" class="verification-input">
                    <button @click="deleteProject()" :disabled="verification!==title" :class="['btn-red',verification===title?'btn-enable':'']">Delete</button>
                </div>
             </div>
         </modal>
    </div>
</template>

<script>

export default {
    props:['id','title','description'],
    data(){
        return{
            csrfToken:null,
            descrip:'',
            verification:''
        }
    },
    mounted(){
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
        this.descrip=this.description;
    },
    methods:{


       notification(type,title,text){
            this.$notify({
            group: 'foo',
            title: title,
            text:text,
            type:type
            });
        },

        updateData(){
            
            axios.post('/project/update',{id:this.id,description:this.descrip},
                        {headers:{ "X-CSRF-TOKEN":this.csrfToken}})
                        .then(resp=>this.notification('success','Project info Updated!',''));
        },
        
        deleteProject(){
            axios.delete(`/project/delete/${this.id}`,
                        {headers:{ "X-CSRF-TOKEN":this.csrfToken}})
                        .then(resp=>{
                            window.location.replace("/dashboard");
                        });
        }
        ,
        showModal(){
              this.$modal.show('delete')
        }
    },
    computed:{



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
  .form{
     margin-top: 20px; 
     display: flex;
     flex-direction: column;
     input,textarea{
         border: 2px solid rgba($color: #cac8c8, $alpha: .3);
         outline: none;
         border-radius: 5px;
         font-size: 18px;
        
         
     }

     input{
         margin-bottom: 10px;
         padding: .4rem;
         text-align: center;
     }
     textarea{
         padding: 1rem;
          color: gray;
          resize: none;
     }
  }  

  .btn-red{
      background-color: #f4aa95;
      border: none;
      outline: none;
      cursor: pointer;
  }

  .btn-search{
     padding: 6px 10px;  
     span{
         font-size: 18px;
         color: whitesmoke;
     }
  }


  .input-container{
     position: absolute;
     right:6rem;
  }
  
  .project-title{
      margin: 10px 0;
      text-align: center;
  }
  .btn-save{
      color: whitesmoke;
      align-self: flex-end;
      margin-top: 20px;
  }

    .modal-container{
        padding: 2rem;
        
        .modal-text{
            margin: 20px 0;
        }
        .verification-container{
            display: flex;
            margin-top: 2rem;
            gap: 10px;
            input{
                width: 80%;
                border: 1px solid rgba($color: #dadada, $alpha: .3);
                outline: none;
                padding: 8px;
            }

            button{
                width: 20%;
                padding: 8px;
                color: gray;
                font-weight: 500;
                font-size: 16px;
            }
        }
    }

    .btn-enable{
        background-color: rgb(240, 84, 84);
        color: white !important;
    }

</style>
