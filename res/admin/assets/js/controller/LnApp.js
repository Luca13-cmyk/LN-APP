class LnApp 
{

    constructor()
    {
        this._firebase = new Firebase();
        this._format = new Format();
        

        this.loadElements();
        this.firebaseAuth();
        this.loadEvents();
        this.elementsPrototype();
        this.moment();

    }
    moment()
    {
        moment.locale("pt-BR");
        document.querySelector("p[data-time]").innerHTML = 
        `Atualizado: ${moment().format('DD [de] MMMM [de] YYYY, h:mm:ss')}`;

    }

    firebaseAuth()
    {
        this._firebase.initAuth().then(response => {

            this.el.profileAvatarFirebase.src = response.user.photoURL;

        });

    }
    firebaseOut()
    {
        this._firebase.auth().signOut().then(function() {
            console.log("deslogado");
          }).catch(function(error) {
            console.log("errro");
          });
    }
    loadElements()
    {
        this.el = {};

        document.querySelectorAll("[id]").forEach(element=>{

            this.el[Format.getCamelCase(element.id)] = element;

        });
    }

    loadEvents()
    {
        let data = {};

        this.el.submitPost.addEventListener("submit", e=>{

            e.preventDefault();
            var formData = this.el.submitPost.getForm();

            let system = formData.get("system");
            let subject = formData.get("subject");
            let text = formData.get("text");
            
            new HttpRequestJquery("post", "/new-post", {system, subject, text}).then(r=>{
                console.log(r);
            }).catch((r)=> {console.error(r)});
            

        });

        this.el.configSidebar.addEventListener("click", e=>{
            this.el.offsetAreaPerToggle.classList.toggle("show_hide");
        });

    }

    elementsPrototype()
    {
        Element.prototype.hide = function ()
        {
            this.style.display = "none";
            return this;

        }
        Element.prototype.show = function ()
        {
            this.style.display = "block";
            return this;
        }
        Element.prototype.toggle = function ()
        {
            this.style.display = (this.style.display === "none") ? "block" : "none";
            return this;

        }
        Element.prototype.on = function (events, fn)
        {
            events.split(' ').forEach(event=>{
                this.addEventListener(event, fn);
            });
            return this;

        }
        Element.prototype.css = function (styles)
        {
            for (let name in styles)
            {
                this.style[name] = styles[name];
            }
        }
        Element.prototype.addClass = function (name)
        {
            this.classList.add(name);
            return this;

        }
        Element.prototype.removeClass = function (name)
        {
            this.classList.remove(name);
            return this;

        }
        Element.prototype.toggleClass = function (name)
        {
            this.classList.toggle(name);
            return this;

        }
        Element.prototype.hasClass = function (name)
        {
            return this.classList.contains(name);
        }
        HTMLFormElement.prototype.getForm = function ()
        {
            return new FormData(this);
        }
        HTMLFormElement.prototype.toJSON = function ()
        {
            let json = {};

            this.getForm().forEach((value, key) => {

                json[key] = value;

            });
            return json;
        }
        
    }

}