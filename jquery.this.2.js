// A function created using Function.bind
var myName = "the global object";
var sayHello = function() {
    console.log( "Hi! My name is " + this.myName );
};
var myObject = {
    myName: "Rebecca"
};
var myObjectHello = sayHello.bind( myObject );
 
sayHello(); // "Hi! My name is the global object"
myObjectHello(); // "Hi! My name is Rebecca"
