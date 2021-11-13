<template>
    <div>
        <ul class="flex flex-wrap justify-center">
            <li class="border border-gray-500 p-3 m-2 rounded"
                :class="verifyClassActive(skill)"
                v-for="(skill, i) in this.skills"
                v-bind:key="i"
                @click="active($event)">{{ skill }}</li>
        </ul>
        <input type="hidden" id="skills" name="skills">
    </div>
</template>
<script>
export default {
    props: ['skills', 'oldskills'],
    data: function () {
        return {
            skillss: new Set()
        }
    },
    created: function () {
        if (this.oldskills) {
            const skillsArray = this.oldskills.split(',');
            skillsArray.forEach(skill => this.skillss.add(skill));
        }
    },
    mounted: function () {
        document.querySelector('#skills').value = this.oldskills;
    },
    methods: {
        active(e) {
            if (e.target.classList.contains('bg-green-500')) {
                e.target.classList.remove('bg-green-500')
                this.skillss.delete(e.target.textContent)
            } else {
                e.target.classList.add('bg-green-500')
                this.skillss.add(e.target.textContent)
            }
            const stringSkills = [...this.skillss];
            document.querySelector('#skills').value = stringSkills;
        },
        verifyClassActive(skill) {
            return this.skillss.has(skill) ? 'bg-green-500' : '';
        }
    }
}
</script>
