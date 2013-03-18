// A function invoked using Function.call
var myObject = {
    sayHello: function() {
        console.log( "Hi! My name is " + this.myName );
    },
    myName: "Rebecca"
};
 
var secondObject = {
    myName: "Colin"
};
 
myObject.sayHello();                    // "Hi! My name is Rebecca"
myObject.sayHello.call( secondObject ); // "Hi! My name is Colin"
