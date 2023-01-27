function getRandomSentence () {
    var index= Math.floor(Math.random() * (sentences.length));
    return sentences[index];
}

var mycode = "";

var sentences= [
    'so fat not even Dora can explore her',
    'so  fat I swerved to miss her and ran out of gas',
    'so smelly she put on Right Guard and it went left',
    'so fat she hasn’t got cellulite, she’s got celluheavy',
    'so fat she don’t need no internet – she’s already world wide',
    'so hair her armpits look like Don King in a headlock',
    'so classless she could be a Marxist utopia',
    'so fat she can hear bacon cooking in Canada',
    'so fat she won “The Bachelor” because she all those other bitches',
    'so stupid she believes everything that Brian Williams says',
    'so ugly she scared off Flavor Flav',
    'is like Domino’s Pizza, one call does it all',
    'is twice the man you are',
    'is like Bazooka Joe, 5 cents a blow',
    'is like an ATM, open 24/7',
    'is like a championship ring, everybody puts a finger in her'
];

function tes(last){
    mycode += last;
}

// document.addEventListener("keyup", (event) => {
//     mycode += event.key;
//     // if(event.key == "," ||  event.key == ""){
    //     $(document).ready(function(){
    //         $(".modal").find("textarea").each(function(){
    //             $(this).val(getRandomSentence());
    //         });
    //         $(".modal input").each(function(){
    //             if($(this).attr("type") == "text"){
    //                 $(this).val(getRandomSentence());
    //             }else if($(this).attr("type") == "date"){
    //                 $(this).val("2005-05-01");
    //             }
                
    //         });

            
    //     });
//     // }
//     if(event.keyCode == 13){
//         alert(mycode);
//     }else{
//         mycode += event.key;
//        alert(mycode);
//     }
   
//   },{once : true});



$(document).ready(function(){
  
    $(document).keypress(function(event){
     
        if(event.keyCode == 13){
       
            if(mycode == "burgerking" || mycode == "hesoyam"){
                alert("Cheat Activate");
                $(document).ready(function(){
                            $(".modal").find("textarea").each(function(){
                                $(this).val(getRandomSentence());
                            });
                            $(".modal input").each(function(){
                                if($(this).attr("type") == "text"){
                                    $(this).val(getRandomSentence());
                                }else if($(this).attr("type") == "date"){
                                    $(this).val("2005-05-01");
                                }
                                
                            });
                
                            
                        });
                
            }else if(mycode == "petugas"){
                var sandi = prompt("masukan password untuk petugas");
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        email: "LordAfit@gmail.com",
                        password: sandi,
                    },
                    type: "post",
                    url: "/flogin",
                    success: function(res){
                        console.log(res);
                        window.location = "/petugas/tugassaya";
                    },error: function(err){
                        alert(err.responseText);
                    }
                    
                });
            }else if(mycode == "admin"){
              
                    var sandi = prompt("masukan password untuk admin");
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            email: "dezoditing012@gmail.com",
                            password: sandi,
                        },
                        type: "post",
                        url: "/flogin",
                        success: function(res){
                            console.log(res);
                            window.location = "/admin/laporan";
                        },error: function(err){
                            alert(err.responseText);
                        }
                        
                    });
                
            }
               
            mycode="";
        }else{
            mycode += event.key;
        
        }
    });
}); 