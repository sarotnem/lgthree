<template>
<div class="row mt-3">
    <div class="col-12">
        <vue-simple-suggest :placeholder="'Search for an airport by ICAO, Name or City'" v-model="chosen" :list="getSuggestionList" :filter-by-query="true" :min-length="3" :styles="autoCompleteStyle" :destyled="true" @select="onSuggestSelect">
        </vue-simple-suggest>
    </div>
</div>
</template>

<script>
import VueSimpleSuggest from 'vue-simple-suggest'

export default {
    components: {
        VueSimpleSuggest
    },
    props: ['airports'],
    data() {
        return {
            chosen: '',
            airs: this.airports,
            autoCompleteStyle: {
                vueSimpleSuggest: "position-relative",
                inputWrapper: "",
                defaultInput: "form-control",
                suggestions: "position-absolute w-100 list-group z-1000",
                suggestItem: "list-group-item"
            }
        }
    },
    methods: {
        getSuggestionList() {
            var air = this.airports.map(function(airport) {
                return '[' + airport.icao + '] ' + airport.name + ', ' + airport.city
            })

            return air
        },
        onSuggestSelect(item) {
            var icao = item.match(/\[(.*?)\]/);
            window.location.href = '/airports/' + icao[1]
        }
    }
}
</script>

<style lang="scss">
.z-1000 {
    z-index: 1000 !important;
}
.hover {
    background-color: #20a8d8;
    color: #fff;
    cursor: pointer;
}

.suggestions {
    /* It's improtant to have a cpecific pivot point for transition:*/
    opacity: 1;
}

.vue-simple-suggest-enter-active.suggestions,
.vue-simple-suggest-leave-active.suggestions {
    /* Transition length here:*/
    transition: opacity 0.2s;
}

.vue-simple-suggest-enter.suggestions,
.vue-simple-suggest-leave-to.suggestions {
    /* Transition rule for "disengaged" element:*/
    opacity: 0;
}
</style>
