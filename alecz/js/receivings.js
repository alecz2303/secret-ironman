Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };    

function calcula(y){
    var item_id = y.value;
    var name = y.name.substring(13);
    var matches = name.match(/\[(\d+)/);
    var row = Number(matches[1]);
        return $.ajax({
            url: '../invReceivingsItems/itemAll',
            data:{item_id:item_id},
            type:'POST',
            success: function(data) {
            var respuesta = JSON.parse(data);
            document.getElementById('InvReceivingsItems_'+row+'_description').value=respuesta.description;
            document.getElementById('InvReceivingsItems_'+row+'_item_unit_price').value=respuesta.unit_price;
            document.getElementById('InvReceivingsItems_'+row+'_item_cost_price').value=respuesta.cost_price;
            document.getElementById('InvReceivingsItems_'+row+'_total').value=respuesta.cost_price;
            total();
            }
        });
        
}

function suma(y){
    var name = y.name.substring(13);
    var matches = name.match(/\[(\d+)/);
    var row = Number(matches[1]);
    
    if(document.getElementById('InvReceivingsItems_'+row+'_discount_percent').value>0){
        document.getElementById('InvReceivingsItems_'+row+'_total').value=(document.getElementById('InvReceivingsItems_'+row+'_item_cost_price').value * document.getElementById('InvReceivingsItems_'+row+'_qty_purchased').value)-((document.getElementById('InvReceivingsItems_'+row+'_discount_percent').value*document.getElementById('InvReceivingsItems_'+row+'_total').value)/100);
    }else{
        document.getElementById('InvReceivingsItems_'+row+'_total').value=document.getElementById('InvReceivingsItems_'+row+'_item_cost_price').value * document.getElementById('InvReceivingsItems_'+row+'_qty_purchased').value;
    }    
    total();
}

function total(){
    var arr = document.getElementsByClassName('inputTotal');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseFloat(arr[i].value))
            tot += parseFloat(arr[i].value);
    }
    document.getElementById('InvReceivings_grand').value = '$ '+tot.formatMoney(2, '.', ',');
}

function validateForm(){
    var arr = document.getElementsByClassName('inputItem');
    var arrDesc = document.getElementsByClassName('inputDescription');
    var arrQty = document.getElementsByClassName('inputQty_purchased');
    var arrPrice = document.getElementsByClassName('inputItem_unit_prices');
        
    var tot=0;
    var totDesc=0;
    var totQty=0;
    var totPrice=0;
    for(var i=0;i<arr.length;i++){
        if(arr[i].value===null || arr[i].value==="" ){
            tot ++;
            arr[i].style.backgroundColor="rgba(153,51,51,0.5)";
            arr[i].style.color="#FFFFFF";
            arr[i].style.border="solid 1px #993333";
        }else{
            arr[i].style.backgroundColor="rgba(111,174,127,0.5)";
            arr[i].style.border="solid 1px #6fae7f";
            arr[i].style.color="#000000";
        }
        if(arrDesc[i].value===null || arrDesc[i].value==="" ){
            totDesc ++;
            arrDesc[i].style.backgroundColor="rgba(153,51,51,0.5)";
            arrDesc[i].style.border="solid 1px #993333";
            arrDesc[i].style.color="#FFFFFF";
        }else{
            arrDesc[i].style.backgroundColor="rgba(111,174,127,0.5)";
            arrDesc[i].style.border="solid 1px #6fae7f";
            arrDesc[i].style.color="#000000";
        }
        if(arrQty[i].value===null || arrQty[i].value==="" || arrQty[i].value==="0"){
            totQty ++;
            arrQty[i].style.backgroundColor="rgba(153,51,51,0.5)";
            arrQty[i].style.border="solid 1px #993333";
            arrQty[i].style.color="#FFFFFF";
        }else{
            arrQty[i].style.backgroundColor="rgba(111,174,127,0.5)";
            arrQty[i].style.border="solid 1px #6fae7f";
            arrQty[i].style.color="#000000";
        }
        if(arrPrice[i].value===null || arrPrice[i].value==="" || arrPrice[i].value==="0"){
            totPrice ++;
            arrPrice[i].style.backgroundColor="rgba(153,51,51,0.5)";
            arrPrice[i].style.border="solid 1px #993333";
            arrPrice[i].style.color="#FFFFFF";
        }else{
            arrPrice[i].style.backgroundColor="rgba(111,174,127,0.5)";
            arrPrice[i].style.border="solid 1px #6fae7f";
            arrPrice[i].style.color="#000000";
        }
    }
   
    
    
    if(tot>0){
        $(".id_item").val(null);
        //return false;    
    }else{
        $(".id_item").val(1);
    }
    if(totDesc>0){
        $(".description").val(null);
        //return false;    
    }else{
        $(".description").val(2);
    }
    if(totQty>0){
        $(".qty_purchased").val(null);
        //return false;    
    }else{
        $(".qty_purchased").val(3);
    }
    if(totPrice>0){
        $(".item_unit_price").val(null);
        //return false;    
    }else{
        $(".item_unit_price").val(4);
    }
    
}

function valida(y){
    var serialnumber = y.value;
    var name = y.name.substring(13);
    var matches = name.match(/\[(\d+)/);
    var row = Number(matches[1]);
        return $.ajax({
            url: '../invReceivingsItems/serialNumber',
            data:{serialnumber:serialnumber},
            type:'POST',
            success: function(data) {
            var respuesta = JSON.parse(data);
            if(respuesta.serialnumber=='ACCEPTED' || respuesta.serialnumber==''){
                y.style.backgroundColor="rgba(111,174,127,0.5)";
                y.style.border="solid 1px #6fae7f";
                y.style.color="#000000";
            }
            else{
                y.style.backgroundColor="rgba(153,51,51,0.5)";
                y.style.border="solid 1px #993333";
                y.style.color="#FFFFFF";
                alert('El numero de serie ya existe en la recepción # '+ respuesta.receivingsid);
                y.focus();
            }
            total();
            }
        });
}