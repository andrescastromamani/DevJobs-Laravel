<template>
    <ul class="flex flex-wrap justify-center">
        <li class="border border-gray-500 p-3 m-2 rounded"
            v-for="(skill, i) in this.skills"
            v-bind:key="i">{{ skill }}
        </li>
    </ul>
</template>
<script>
export default {
    props: ['skills'],
    mounted() {
        console.log(this.skills)
    }
}
</script>
