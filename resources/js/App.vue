
<template>
    <div style="padding: 20px; font-family: sans-serif; max-width: 600px;">
        <h1>Kratos vs Wild Monster</h1>

        <BattleControls :loading="loading" @run="handleRunBattle" />

        <div v-if="battle" style="margin-top: 20px;">
            <BattleStats
                :winner="battle.winner"
                :totalTurns="battle.total_turns"
                :kratosHealth="battle.kratos_health"
                :kratosStrength="battle.kratos_strength"
                :monsterHealth="battle.monster_health"
                :monsterStrength="battle.monster_strength"
            />

            <BattleLogs :logs="battle.logs" />
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { runBattleApi } from './services/battleApi';
import BattleControls from './components/BattleControls.vue';
import BattleStats from './components/BattleStats.vue';
import BattleLogs from './components/BattleLogs.vue';

const battle = ref(null);
const loading = ref(false);

const handleRunBattle = async () => {
    loading.value = true;
    try {
        battle.value = await runBattleApi();
    } catch (err) {
        console.error(err);
    } finally {
        loading.value = false;
    }
};
</script>
