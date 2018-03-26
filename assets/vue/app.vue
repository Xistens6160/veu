<template>
    <div>
        {{ message }}
        <titlex></titlex>
    </div>
</template>

<script>
    import Titlex from '../vue/titlex.vue';

    export default {
        data: function() {
            return {
                test : true,
                message: 'Hello Vue!'
            }
        },
        components: {
            Titlex
        }
    }
</script>