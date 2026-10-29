export const runBattleApi = async () => {
    const res = await fetch('/api/battles/run', {
        method: 'POST',
        headers: { 'Accept': 'application/json' }
    });

    if (!res.ok) {
        throw new Error('API Request Failed');
    }

    return await res.json();
};
