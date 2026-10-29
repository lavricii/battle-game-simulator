<template>
    <div>
        <h2>
            Result: {{ winner === 'Draw' ? 'Match Ended in a Draw' : `${winner} Wins!` }}
        </h2>
        <p>Total Turns: {{ totalTurns }}</p>

        <h3>Initial Stats</h3>
        <ul>
            <li>Kratos HP: {{ kratosHealth }} | Strength: {{ kratosStrength }}</li>
            <li>Monster HP: {{ monsterHealth }} | Strength: {{ monsterStrength }}</li>
        </ul>
    </div>
</template>

<script setup>
defineProps({
    winner: String,
    totalTurns: Number,
    kratosHealth: Number,
    kratosStrength: Number,
    monsterHealth: Number,
    monsterStrength: Number
});
</script>
