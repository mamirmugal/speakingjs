function A(){ 
    var self = this;
    var private = '';

    this.getPrivate = function(){ 
        console.log("ret " + self.private)
    }; 

    this.setPrivate = function(_private){ 
        self.private = _private; 
    }; 
}

function B(){};

B.prototype = new A();

b1 = new B();
b2 = new B();

b1.setPrivate("b1");
b2.getPrivate();
