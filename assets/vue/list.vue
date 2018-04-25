<template>
    <div>
        <router-link to="/post" id="createpostbutton" class="btn btn-success button" tag="button">create new post
        </router-link>
        <br/>
        <div v-for="(res, index) of response['hydra:member']">
            <div class="entry">
                <p class="title">{{ res.headline }} </p>
                <div class="author"> from  {{ res.author }}</div>
                <p class="date"> {{ res.releaseDate }}</p>
                <p class="subtext">{{ res.subtext }}</p>
                <router-link :to="{path:'/entry?id=' + res.id}">click here to read more</router-link>
            </div>
        </div>
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
                    axios.get('/api/blogposts')
                        .then(response => {
                            this.response = response.data;
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                },
            },
        created() {
            this.getData();
        }
    }
</script>
<style>
    #createpostbutton {
        width: 200px;
        height: 50px;
    }

    .entry {
        border: solid;
        margin: 20px;
    }

    .title {
        margin-left: 8px;
        font-size: xx-large;
    }

    .author {
        margin-left: 8px;
        margin-top: -12px;
        color: grey;
        font-size: larger;
    }

    .date {
        margin-top: -36px;
        margin-left: 1500px;
        font-size: large;
    }

    .subtext {
        margin-top: 15px;
        margin-left: 10px;
        margin-right: 10px;
    }

</style>