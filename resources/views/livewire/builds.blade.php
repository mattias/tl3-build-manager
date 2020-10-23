<div>
    <x-table :data="$builds"></x-table>
</div>


@push('scripts')
    <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.24.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.15.3/firebase-analytics.js"></script>
    <script>
        document.addEventListener('livewire:load', function() {
            var firebaseConfig = {
                apiKey: "AIzaSyB99WKEqUjeDZURpv_vDefNaoFxfNon5eY",
                authDomain: "skillcalc-3e54c.firebaseapp.com",
                databaseURL: "https://skillcalc-3e54c.firebaseio.com",
                projectId: "skillcalc-3e54c",
                storageBucket: "skillcalc-3e54c.appspot.com",
                messagingSenderId: "481753096379",
                appId: "1:481753096379:web:c7d050df1d7c839571099e",
                measurementId: "G-EX4EV393PY"
            };

            firebase.initializeApp(firebaseConfig);
            firebase.analytics();

            let db = firebase.firestore()
            let data = [];

            const snapshot = db.collection('Builds').get().then(doc => {
                doc.forEach(row => {
                    data.push(row.data());
                });

                @this.builds = data;
            });
        });

    </script>
@endpush
