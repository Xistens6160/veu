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
            <div class="comments" v-for="(res,index) of usercomments">
                <p class="user">{{ res.commentauthor}} </p>
                <p class="usercomment">{{ res.commentbody }}</p>
                <p class="commentdate">{{ res.publicationDate }}</p>
            </div>
        </div>
        <textarea id="comment" type="text" class="form-control" placeholder="Write your own Comment"
                  v-model="commenttext"></textarea>
        <p id="name">Write your name:</p>
        <textarea id="commentname" type="text" class="form-control" placeholder="Write your name"
                  v-model="commentname"></textarea>
        <router-link to="/" id="backbutton" class="btn btn-danger button" tag="button">Get Back</router-link>
        <button class="btn btn-primary" id="postbutton" v-on:click="postComment">POST</button>

    </div>
</template>
<script>
    import axios from 'axios';

    export default {
        data: function () {
            return {
                response: [],
                usercomments: [],
                commenttext: "",
                commentname: "Annonym",
                id: "api/blogposts/" + this.$route.query.id
            }
        },

        methods:
            {
                getData: function () {
                    axios.get('/api/blogposts/' + this.$route.query.id)
                        .then(response => {
                            this.response = response.data;
                            this.getComments();
                        })
                        .catch(function (error) {
                            console.log(error);
                        })
                },

                postComment: function () {
                    axios.post('/api/comments', {
                            blogtext: this.id,
                            commentbody: this.commenttext,
                            commentauthor: this.commentname,
                            publicationDate: this.date
                        },
                        this.$router.push("/entry?id=" + this.$route.query.id))
                },

                getComments: function () {
//                    this.usercomments.push({"hydra:member" : []});
                    this.response.comments.forEach(function (currentValue) {
                        axios.get(currentValue)
                            .then(function (response) {
                                this.usercomments.push(response.data);
                                console.log(JSON.parse(JSON.stringify(this.usercomments)));
                            }.bind(this))
                            .catch(function (error) {
                                console.log(error);
                            })
                    }.bind(this));
                },
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

        mounted() {
            this.getData();
        }
    }
</script>
<style>
    #postbutton {
        margin-top: -70px;
        width: 125px;
        font-size: larger;
    }

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

    .comment {
        margin-top: 20px;
    }

    #comment {
        margin-top: 40px;
    }

    .comments {
        margin-top: 25px;
    }

    #name {
        font-size: large;
        margin-top: 25px;
    }

    #commentname {
        width: 200px;
        height: 36px;
        margin-left: 200px;
        margin-top: -40px;
    }

</style>