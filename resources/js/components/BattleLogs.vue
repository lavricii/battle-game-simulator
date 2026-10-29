<template>
    <div>
        <h3>Battle Stats:</h3>
        <ol>
            <li v-for="log in logs" :key="log.id" style="margin-bottom: 8px;">
                <strong>Turn {{ log.turn_nr }}:</strong> {{ log.attacker }} attacked {{ log.defender }}
                for {{ log.damage }} damage.
                <span v-if="log.missed">(Missed attack)</span>
                <span v-if="log.used_skills && log.used_skills.length">
          (Skills: {{ log.used_skills.join(', ') }})
        </span>
                <br>
                <small>{{ log.defender }} Remaining HP: {{ log.defender_health_remained }}</small>
            </li>
        </ol>
    </div>
</template>

<script setup>
defineProps({
    logs: Array
});
</script>
