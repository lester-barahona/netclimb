<template>
    <div class="project-card animate__animated animate__fadeIn">
        <div class="img-section">
            <img src="img/default.jpg" alt="">
            <a :href="'project/config/'+id" class="btn-config"><span class="material-icons">settings</span></a>
        </div>
        <div class="info-container">
            <h3>{{name}}</h3>
            <p v-html="description"></p>
            <a class="btn-black btn-md" target="_blank" :href="url">Visit website</a>
            
            <a class="copy" @click.prevent="copyToClipBoard"><span class="material-icons">content_paste</span></a>

        </div>
         <notifications group="foo" position="bottom left" width="215"/>
        
    </div>
</template>

<script>
export default {
    
    data(){
        return {
           
        };
    },

    props:['name','description','url','id'],

    methods:{

        copyToClipBoard(){
            const input = document.createElement("input");
            input.value = this.url;

            // Avoid scrolling to bottom
            input.style.top = "0";
            input.style.left = "0";
            input.style.position = "fixed";

            document.body.appendChild(input);
            input.focus();
            input.select();
         
            input.setSelectionRange(0, 99999); /*For mobile devices*/

            document.execCommand("copy");

            document.body.removeChild(input);
            this.notification('info','Copied to clipboard!','');
        },

         notification(type,title,text){
            this.$notify({
            group: 'foo',
            title: title,
            text:text,
            type:type
            });
        },

        showModal(){
            //  this.$modal.show('modal'+this.name);
        }

    }

}
</script>

<style lang="scss" >
  
    .project-card{
        position: relative;
        background-color: white;
        padding: 2rem;
        border-radius: 10px;
        display: flex;
        gap: 50px;
        margin-top: 1rem;
        border: 1px solid rgba($color: #c0c0c0, $alpha: .3);
        .img-section{
            width: 10%;
            img{
                width: 100%;
            }
        }
        .info-container{
            p{
            margin: 15px 0 25px 0;
            }
        }
    }

    .copy{
        position: absolute;
        top: 0;
        right: 0;
        padding: 4px;
        color: white;
        cursor: pointer;
        background-color: #d4ecff;
        border-radius: 0 10px 0 5px;
        span{
                font-size: 18px;
        }
    }

    .btn-config{
        padding: 8px;
        display: inline-block;
        background-color: whitesmoke;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        cursor: pointer;
        span{
            font-size: 18px;
        }

        &:hover{
            background-color: rgba(245, 245, 245, 0.5);
        }
    }

</style>