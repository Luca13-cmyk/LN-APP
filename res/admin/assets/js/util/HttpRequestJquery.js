class HttpRequestJquery
{
    constructor(method, url, data = {}){

        return new Promise((resolve, reject) => {

            $.ajax({
                method,
                url,
                data
              })
                .done(function( msg ) {
                  resolve(msg);
                })
                .fail(function(){
                    reject("Erro");
                });


        });
    }
    
}