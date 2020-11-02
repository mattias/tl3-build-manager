<div>
    <iframe id="skill-calculator" class="h-screen w-screen" src="https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html"></iframe>
</div>

<script>
    window.addEventListener('message', (event) => {
        if (event.origin !== "https://tools.torchlightfansite.com")
        return;

        console.log(event.data);
    }, false);
</script>
