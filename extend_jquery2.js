var Super = function(){
 this.member1 = 'supermember';
};

var Sub = function(){
    var self = this;
    $.extend(this,new Super());
    var member2 = "private";
};

Sub.prototype = {
        member3 : 'subMember3',
        getMember : function(){
            return self.member2;
        },
        setMember : function (){
            this.member2 = "public";
        },
        getParent : function(){
            return this.member1;
        },
        getThis : function(){
        return this;
        }
    };

var s = new Sub();
//s.setMember();
//s.getMember();
//s.getParent();
s.getThis();

