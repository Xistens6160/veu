<template>
    <div>
        <h1>{{ response.headline }}</h1>
        <p id="postdate">{{ response.releaseDate }}</p>
        <p id="postauthor"> from {{ response.author }} </p>
        <p id="postsubtext">{{ response.subtext }}</p>
        <br/>
        <p id="posttext">{{ response.blogText }}</p>
        <br/>
        <br/>
        <h1>Comments</h1>
        <div class="comment">
            <p class="user">Dummy Bot</p>
            <p class="usercomment">Lol you are so DummyLol you are so DummyLol you are so DummyLol you are Lol you are so DummyLol you are so DummyLol you are so DummyLol you are so DummyLol you are so Dummyso DummyLol you are so Dummy</p>
            <p class="commentdate">27/03/2018</p>
        </div>
        <div class="comment">
            <p class="user">Dummy Bot</p>
            <p class="usercomment">Lol you are so Dummy</p>
            <p class="commentdate">27/03/2018</p>
        </div>
        <router-link to="/" id="backbutton" class="btn btn-danger button" tag="button">Get Back</router-link>
    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data: function () {
            return {
                response: []
            }
        },

        methods:
            {
                getData: function () {
                    axios.get('/api/blogposts/12')
                        .then(response => {
                            this.response = response.data;
                        })
                }
            },

        created() {
            this.getData();
        }
    }
</script>
<style>
    #backbutton {
        width: 125px;
        margin-left: 1500px;
        margin-top: 20px;
    }

    #postdate {
        margin-left: 1500px;
        font-size: x-large;
        margin-top: -45px;
    }

    #postauthor {
        color: grey;
        margin-top: -5px;
    }

    #postsubtext {
        font-size: large;
    }

    #posttext {
        font-size: large;
    }

    .user {
        font-size: large;
        border: green solid;
        max-width: 150px;
        height: 40px;
        text-align: center;
    }

    .usercomment {
        margin-left: 200px;
        border: solid;
        font-size: large;
        margin-top: -49px;
        max-width: 1250px;
        min-height: 40px;
        text-align: center;
    }

    .commentdate {
        margin-left: 1500px;
        font-size: large;
        margin-top: -39px;
    }

    .comment{
        margin-top: 20px;
    }

</style>