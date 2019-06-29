<template>
<div>
    <div class="list-group-item list-group-item-accent-info">
        <a :href="'/airports/'+favorite.icao">
            <div>
              <strong>{{ favorite.icao }}</strong>
            </div>
            <small class="text-muted mr-3">{{ favorite.name }}, {{ favorite.city }}</small>
        </a>
    </div>
</div>
</template>

<script>
import { EventBus } from '../bus.js';

export default {
    name: 'favorite-item',
    props: ['favorite'],

}
</script>
