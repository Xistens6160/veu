<template>
    <div>
        <input id="nameinput" type="text" class="form-control" placeholder="Your Name" v-model="postname">
        <input id="entryname" type="text" class="form-control" placeholder="Entry Title" v-model="posttitle">
        <p id="date" v-model="currentdate"> {{ date }} </p>
        <br>
        <textarea id="subtext" type="text" class="form-control"
                  placeholder="This Text will displayed on the List" v-model="subtext"></textarea>
        <br>
        <textarea id="entrytext" type="text" class="form-control" placeholder="Your Post Text" v-model="posttext"></textarea>
        <br>
        <button class="btn btn-primary" id="postbutton" v-on:click="postBlog">POST</button>
        <router-link to="/" id="cancelbutton" class="btn btn-danger button" tag="button">Cancel</router-link></div>
</template>

<script>
    import axios from 'axios';


    export default {
        data: function () {
            return {
                postname : "",
                posttitle : "",
                subtext : "",
                posttext : "",
                currentdate : date
            }
        },

        computed: {
            date: function () {
                var currentdate = new Date();
                var dd = currentdate.getDate();
                var mm = currentdate.getMonth() + 1;
                var yyyy = currentdate.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd
                }
                if (mm < 10) {
                    mm = '0' + mm
                }
                var currentdate = dd + '/' + mm + '/' + yyyy;
                return currentdate;
            }
        },

        methods: {
            postBlog : function () {
                axios.post('/api/blogposts', {
                    headline: this.posttitle,
                    author: this.postname,
                    releaseDate: this.date,
                    blogText : this.posttext,
                    subtext : this.subtext
                    })
                this.$router.push("/")
            }
        }
    }
</script>

<style>
    #nameinput {
        height: 40px;
        width: 300px;
        font-size: larger;
        margin-bottom: 20px;
    }

    #entryname {
        margin-left: 350px;
        height: 40px;
        width: 500px;
        font-size: larger;
        margin-bottom: 20px;
        margin-top: -57px;
    }

    #entrytext {
        height: 600px;
        width: 1500px;
        font-size: larger;
        margin-bottom: 20px;
    }

    #date {
        font-size: x-large;
        margin-left: 1200px;
        margin-top: -58px;
    }

    #subtext {
        width: 1500px;
        font-size: larger;
        margin-bottom: 20px;
    }

    .button {
        width: 100px;
        height: 50px;
        text-align: center;
        font-size: x-large;
    }

    #cancelbutton {
        margin-left: 1300px;
    }

</style>