<div>
    <iframe id="skill-calculator" class="h-screen w-screen" src="https://tools.torchlightfansite.com/tlfskillcalculator/build-dm.html" />
</div>

<script>
    let skillCalculator = document.querySelector('#skill-calculator');

    skillCalculator.addEventListener('load', () => {
        console.log('hello world');
    });

    skillCalculator.addEventListener('message', (event) => {
        if (event.origin !== "https://tools.torchlightfansite.com/")
        return;

        console.log('received message ' + event.data);
    }, false);
</script>
