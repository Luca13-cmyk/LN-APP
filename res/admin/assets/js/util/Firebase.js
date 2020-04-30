
class Firebase
{
    constructor()
    {
        this._config = {

            apiKey: "AIzaSyALd2KqlW_K_-0C_KH_6fLxHTT8EYu9ti8",
            authDomain: "ln-app.firebaseapp.com",
            databaseURL: "https://ln-app.firebaseio.com",
            projectId: "ln-app",
            storageBucket: "ln-app.appspot.com",
            messagingSenderId: "545992738239",
            appId: "1:545992738239:web:b185cf655114d06d838d0a",
            measurementId: "G-J01KRNYWYX"
        }
        this.init();
    }

    init()
    {
        if (!window._initializedFirebase)
        {

            firebase.initializeApp(this._config);
            firebase.analytics();


            // firebase.firestore().settings({
            //     timestampsInSnapshots: true
            // });

            window._initializedFirebase = true;
        }
    }

    static db()
    {
        return firebase.firestore(); // Real Time DB
    }

    static hd()
    {
        return firebase.storage(); // Arquivos na nuvem
    }

    initAuth()
    {
        return new Promise((s, f)=>{

            if (localStorage.login)
            {
                let data = JSON.parse(localStorage.login);
                let token = data.credential.accessToken;
                let user = data.user;

                s({
                    user, token
                });
                return;
            }

            let provider = new firebase.auth.GoogleAuthProvider();

            firebase.auth().signInWithPopup(provider)
            .then(result=>{

                if (result.credential)
                {

                    localStorage.login = JSON.stringify(result);
                    
                    let token = result.credential.accessToken;
                    let user = result.user;
                    
                    s({
                        user, token
                    });
                }

            })
            .catch(err => {
                f(err);
            });

        });
    }
}