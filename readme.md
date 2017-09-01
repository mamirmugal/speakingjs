# Speaking JS ES5

## Part III

## Variables: Objects and Inheritance


### Layer 1: Single Objects
- All objects in js are maps from string to values
- this (key, value) entry is an object and is called `property`
- property `key` is always text string
- property `value` can be value, functions
- `methods` are properties whose value is function



#### Object Literals
- allows to you create object directly with `{}`
- `this` is used in method to access its own `property` and `methods`
- `,` end comma, is allow in some browsers


#### Dot Operator
```
var jane = {
    name: 'Jane',

    describe: function () {
        return 'Person named '+this.name;
    }
};
```

- this is the method to access properties
```
jane.name
'Jane'
```

- they can also be accessed with brackets
```
jane['describe']()
'Person named Jane'
```

- unknown property will get `undefined`
```
jane.age
undefined
```

- calling methods and assigning properties are same
- assigning unknown property will create it and assign value to it
```
jane.age = 32
32
```

- `delete` will completely remove the property
- `delete` will only work on its own property, the prototype property cannot be deleted
```
delete jane.age
true
```

- creating object who's properties can be deleted
```
var obj = {};
Object.defineProperty(obj, 'canBeDeleted', {
    value: 123,
    configurable: true
});

delete obj.canBeDeleted
true
```

- create an object who's property cannot be deleted
```
var obj = {};
Object.defineProperty(obj, 'canBeDeleted', {
    value: 123,
    configurable: true
});

delete obj.cannotBeDeleted
false
```

- delete returns true even if it doesn’t change anything (inherited properties are never removed):
```
delete obj.toString
true

obj.toString // still there
[Function: toString]
```



### Unusual Property Keys
- reserve can be used as property name
```
var obj = { var: 'a', function: 'b' };
obj.var
'a'

obj.function
'b'
```

- Number can be used but they are interpreted as strings
```
var obj = { 0.7: 'abc' };
Object.keys(obj)
[ '0.7' ]
obj['0.7']
'abc'
```

- sentences can also be used as key, but need to be defined and accessed with quotes
```
var obj = { 'not an identifier': 123 };
Object.keys(obj)
[ 'not an identifier' ]

obj['not an identifier']
123
```


### Bracket Operator
- method can be called with brackets
```
var obj = { myMethod: function () { return true } };
obj['myMethod']()
true
```

- new properties can be created with brackets
```
var obj = {};
obj['anotherProperty'] = 'def';
obj.anotherProperty
'def'
```

- values be deleted with brackets
```
var obj = { 'not an identifier': 1, prop: 2 };
Object.keys(obj)
[ 'not an identifier', 'prop' ]

delete obj['not an identifier']
true

Object.keys(obj)
[ 'prop' ]

```

- dot operator uses fixed property name, brackets allow expressions
```
var obj = { someProperty: 'abc' };

obj['some' + 'Property']
'abc'

var propKey = 'someProperty';
obj[propKey]
'abc'
```

- any expression between brackets are converted string
```
var obj = { '6': 'bar' };
obj[3+3]  // key: the string '6'
'bar'
```


### Converting Any Value to an Object
- `Object` can be used to create object of that wrapper function
- but all of them are `typeof` object but different type
```
Object(null) instanceof Object
true

Object(false) instanceof Boolean
true

new Object(123) instanceof Number
true

var obj = {};
Object(obj) === obj
true
```



###  Implicit Parameter of Functions and Methods
- `this` in sloppy mode is equal to window/global
```
function returnThisSloppy() { return this }
returnThisSloppy() === window
true
```

- `this` in strict mode will refer to its own function scope
```
function returnThisStrict() { 'use strict'; return this }
returnThisStrict() === undefined
true
```

- `this` will refer to the object when used in method
```
var m = {
    method: function(){
        return this;
    }
};

m.method() === m
true
```



### Calling Functions While Setting this: call(), apply(), and bind()
- `Call()`
    - will be called by the function and take first param as `this` or the object to which method `this` will point to
    - takes arguments as normal param, comma separated
```
var m = {
    name: "m",
    method: function(val){
        return this.name+ " " +val;
    }
};

var n = {
    name: "n"
};

m.method.call(n, 'nvalue');
'n nvalue'
```

- `apply`
    - it is same as call but only take arguments as array
```
m.method.apply(n, ['nvalue']);
'n nvalue'
```

- `bind`
    - Use .bind() when you want that function to later be called with a certain context
    - is a method to create new function, allowing to point to any object with first param
    - first param can be `this` or any object
    - `bind` will not working `function`, it will only work on `object literal`

- Examples 1 `function declaration`
    - we have a object, with `property` and `method`
    - created a new object with same `property`
    - created another object and copied `method` to it, but binding with the object that has the `property` that method needs
    - when working with `function declaration` we need to create object with `new` keyword otherwise bind dont work on `function declaration`
```
function testFun(){
    this.name = "name";

    this.getName = function(){
        return this.name;
    };
}

var obj = { name: "obj name"};

var d = (new testFun).getName.bind(obj)

d(); // will be function but will have name value set
```

- Examples 2 (function declaration but with prototype)
    - we cannot bind with `function`, with function we need object
    - object literal and function object can be binded
```
function funDec(){
    this.x = "name";
}

funDec.prototype.getX = function(){
    return this.x;
}

var cd = (new funDec).getX.bind(funDec);
cd() // undefined, we cannot bind with function, even if it is its own object
// but
var cdd = (new funDec).getX.bind(new funDec);
cdd() // name

function testOneMore(){
    this.x = "the one more"
}
var hdd = (new funDec).getX.bind(new testOneMore);

hdd();
```

- Examples 3 (object literal)
    - object literal can work directly with `bind` method
    - also pass object literal and bind the function to new object
```
funcLit = {
    x: "newname",
    getX : function(){
        return this.x;
    }
};

var cd = funcLit.getX.bind(funcLit);
cd(); // newname

var dd = cd.bind({x:"changed"})
dd() // newname will not be changed
```

- Example 4
    - with new param
```
function funDec(){
    this.x = "name";
}

funDec.prototype.getX = function(names){
    return this.x + names;
}

var cdd = (new funDec).getX.bind(new funDec, " test");
cdd() // name test
```

- Errors 1
    - object literal dont have a prototype chain
```
funcLit = {
    x: "newname"
};
funcLit.prototype.getX = function(){
    return this.x;
}
funcLit.getX() // it has no method, will throw error, becoz it is not an object
var cd = funcLit.getX.bind(funcLit);
```

- `...` triple dot operator
    - it works as `apply` but dont take `this` as first param, but `...`
    - it also works with constructor eg
```
    new Date(...[2011, 11, 24])
```



### Pitfall: Losing this When Extracting a Method
- if a method is extracted, it becomes true function
- object will not work properly
```
var counter = {
    count: 0,
    inc: function () {
        this.count++;
    }
}
```

- now after extraction and then calling will not work
```
var func = counter.inc;
func()
counter.count  // didn’t work
0
```

- because it will add value to `window.count`, which will give `NaN` becoz count was not defined
```
count  // global variable
NaN
```


#### How to get warning
- if we use strict js will throw error when inc is called
- Error is thrown because `this` is undefined
```
var counter = {
    count: 0,
    inc: function () {
        'use strict';
        this.count++;
    }
}

var func2 = counter.inc;
func2()
TypeError: Cannot read property 'count' of undefined
```



#### How to properly extract a method
- to fixed problem with `this.count` not found we can use `bind()`
- binding it object literal, will fix the problem
```
var func3 = counter.inc.bind(counter);
func3()
counter.count  // it worked!
1
```

- This method can also be send to `setTimeout()`
```
callIt(counter.inc.bind(counter))
counter.count  // one more than before
2
```


**NOTE**
- strict mode will not allow `this` in function declaration, directly, we need object for that
```
function func(){
    this.counter = function(){
        'use strict';
        this.count = 0;
        this.count++;
    }
}
var a = new func();
a.counter() // will work
```

- `this` will not work here
```
var func2s = function () { 'use strict'; this.count = 0; this.count++ };
func2s()
```

- However in object literal we can use it directly
```
var person = {
    name : 'xyz',
    position : 'abc',
    fullname : function () {  "use strict"; return this.name; }
};
person.fullname()
```

- `this` will not work here
```
counter.inc = function () { 'use strict'; this.count++ };
var func2 = counter.inc;
func2()
```





### Pitfall: Functions Inside Methods Shadow this
- function within function makes it diffucult to use `this`
- inner `this` is shadowed by outer `this`
```
var obj = {
    name: 'Jane',
    friends: [ 'Tarzan', 'Cheeta' ],
    loop: function () {
        'use strict';
        this.friends.forEach(
            function (friend) {  // (1)
                console.log(this.name+' knows '+friend);  // (2)
            }
        );
    }
};
```

#### Workaround 1: that = this
```
loop: function () {
    'use strict';
    var that = this;
    this.friends.forEach(function (friend) {
        console.log(that.name+' knows '+friend);
    });
}
```


#### Workaround 2: bind()
- `bind` is attach to function itself
```
loop: function () {
    'use strict';
    this.friends.forEach(function (friend) {
        console.log(this.name+' knows '+friend);
    }.bind(this));  // (1)
}
```


#### Workaround 3: a thisValue for forEach()
- `forEach`, second param should be passed `this`
```
loop: function () {
    'use strict';
    this.friends.forEach(function (friend) {
        console.log(this.name+' knows '+friend);
    }, this);
}
```


#######################################################################

### Layer 2: The Prototype Relationship Between Objects
- prototype relationship between object is inheritance
- an objects prototype is is specified by `prototype`
- this `prototype` may also be `null`
- the chain of object connection through `prototype` is called `prototype chain`
- Direct way to inherit
```
var proto = {
    val: "value",
    describe: function () {
        return 'name: '+this.name;
    }
};

var obj = {
    __proto__: proto,
    name: 'obj'
};
```



### Inheritance
- above example, when `obj.describe` is search it looks in its `prototype` and its prototype and so on.
- although the `describe` is taken from different object `this` inside `describe` always points to itself
```
obj.describe()
'name: obj'
```

- overriding property is simple, just overwrite the property with new value/function and it is replaced
```
obj.describe = function () { return 'overridden' };
obj.describe()
'overridden'
```



### Sharing Data Between Objects via a Prototype
- prototype can be use to share properties/methods between objects
- we should avoid adding ame method to different object
- we can add them to another class and let them inherit from them
- we can use `__proto__` direct method

```
var PersonProto = {
    describe: function () {
        return 'Person named '+this.name;
    }
};

var jane = {
    __proto__: PersonProto,
    name: 'Jane'
};

var tarzan = {
    __proto__: PersonProto,
    name: 'Tarzan'
};
```

- Now when we call `describe()` on different object they will give different result
```
jane.describe()
Person named Jane
tarzan.describe()
Person named Tarzan
```

- Here the `property - name` is on first object in prototype chain
- And `methods - describe()` resides on later object



### Getting and Setting the Prototype
- JS dont allow to access internal property `__proto__`
- js has method to read and create new objects


#### Creating a new object with a given prototype
- usually used to create inheritance
- `Object.create(proto, propDescObj?)`
    - creates an object who's prototype is `proto`
    - `propDescObj` allow to add properties and their permission too
```
var PersonProto = {
    describe: function () {
        return 'Person named '+this.name;
    }
};

var jane = Object.create(PersonProto, {
    name: { value: 'Jane', writable: false }
});
```

```
jane.describe()
'Person named Jane'

jane.name = "New name" // this will not effect

jane.describe()
'Person named Jane'
```

- Mostly object is created and properties are added later on
```
var jane = Object.create(PersonProto);
jane.name = 'Jane';
```


#### Reading the prototype of an object
- `Object.getPrototypeOf(obj)`, will give the description of the prototype object
- it will not provide the name
```
Object.getPrototypeOf(jane) === PersonProto
true
```


#### Checking whether one object a prototype of another one
- `isPrototypeOf`, is used to check if the object is directly linked to another object
- this method will not check the whole prototype chain, so i will get parent, not grandparent
```
var A = {};
A.val = "A value";
var B = Object.create(A);
B.tst = "B test";
var C = Object.create(B);

A.isPrototypeOf(C)
true
C.isPrototypeOf(A)
false

getDefiningObject(C, 'val') === A   // will get the object with that property
```

- custom function to get the object which has a particular property
```
function getDefiningObject(obj, propKey) {
    obj = Object(obj); // make sure it’s an object
    while (obj && !{}.hasOwnProperty.call(obj, propKey)) {
        obj = Object.getPrototypeOf(obj);
        // obj is null if we have reached the end
    }
    return obj;
}

getDefiningObject(obj, 'method');
```



### The Special Property __proto__
- it is not a standard of ES5, and some engines my not suport it
- __proto__ and it will be part of ECMAScript 6.
- check if engine supports porto or not
```
Object.getPrototypeOf({ __proto__: null }) === null
```


### Setting and Deleting Affects Only Own Properties
- when getting a property searches whole prototype chain
- setting and deleting ignores inheritance and affects only the properties


#### Setting property
- inheriting property does not belong to its own
```
var proto = { foo: 'a' };
var obj = Object.create(proto);

obj.foo   // is accessabel
'a'

obj.hasOwnProperty('foo')
false       // but dont below to obj
```

- setting property will only set its own property, even if parent has that property
- we have also not changed the `foo` property of `proto`
```
obj.foo = 'b';
obj.foo
'b'

obj.hasOwnProperty('foo')
true

proto.foo
'a'
```


####  Deleting an inherited property
- only own property can be delete not inherited property
```
var proto = { foo: 'a' };
var obj = Object.create(proto);
obj.test = "home"

delete obj.foo
true

obj.foo
'a'

delete obj.test
true

obj.test
undefined
```


#### Changing properties anywhere in the prototype chain
- we can use `getDefiningObject` custom method to get the object which has specific object
- then delete it from there
```
var del = getDefiningObject(obj, 'foo')
delete del.foo
true

obj.foo
undefined
```



### Iteration and Detection of Properties
- `Inheritance`, inherited property is stored on its prototype
- `Enumerability`, setting property attribute, a flag `true` or `false`



### Listing Own Property Keys
- only own property keys can be listed
- `enumerable` ones can also be listed
    - they are only visible with `for-in` or `Object,keys`
    - any property create by `defineProperty` are default not-enumerable
- `Writable`
    - If false, the value of the property can not be changed.
- `Configurable`
    - If false, any attempts to delete the property or change its attributes (Writable, Configurable, or Enumerable) will fail.

- `Object.getOwnPropertyNames(obj)` list properties and method
- `Object.keys(obj)` return all enumerable own properties
```
var obj2 = {
    tst : 'obj2',
    chk : function(){ return this.tst }
}
Object.getOwnPropertyNames(obj)
(2) ["tst", "chk"]

Object.keys(obj)
(2) ["tst", "chk"]
```



### Listing All Property Keys
- to list all properties both own and inherited, we can use loop
```
var obj = {
tst:"home",
chk:function(){ return this.tst }
}

for( var x in obj)
    console.log(x  + " " + typeof obj[x])

tst object
chk function
```

- Custom function to list all properties, not just enumerable

```
function getAllPropertyNames(obj) {
    var result = [];
    while (obj) {
        // Add the own property names of `obj` to `result`
        result = result.concat(Object.getOwnPropertyNames(obj));
        obj = Object.getPrototypeOf(obj);
    }
    return result;
}

getAllPropertyNames(obj)

["tst", "chk", "__defineGetter__", "__defineSetter__", "hasOwnProperty", "__lookupGetter__", "__lookupSetter__", "propertyIsEnumerable", "toString", "valueOf", "__proto__", "constructor", "toLocaleString", "isPrototypeOf"]
```


### Checking Whether a Property Exists
- `in` can be used to get property but it gets property of from proto as well
```
var A = {};
A.val = "val";

var B = Object.create(A);
B.tst = "testing";

var C = Object.create(B);
```

```
'tst' in C    // is getting it form prototype chain
true

'tst' in B    // getting its own property
true

'tst' in A    // does not have its own property
false
```

- `hasOwnProperty` can be used to get its own property
```
C.hasOwnProperty("tst")       // dont own `tst` property
false

B.hasOwnProperty("tst")       // getting own property
true
```

- However `hasOwnProperty` should not be used directly
- it may be some objects property key
```
var obj = { hasOwnProperty: 1, foo: 2 };
obj.hasOwnProperty('foo')  // unsafe
TypeError: Property 'hasOwnProperty' is not a function
```

- Best way to call `hasOwnProperty` is by object prototype
```
Object.prototype.hasOwnProperty.call(B, 'tst')  // safe
true

{}.hasOwnProperty.call(B, 'tst')  // shorter
true
```


### Examples
- `defineProperties` are used to define property
- when inheritance `Object.create` can also have 2 param to define property
```
var proto = Object.defineProperties({}, {
    protoEnumTrue: { value: 1, enumerable: true },
    protoEnumFalse: { value: 2, enumerable: false }
});
var obj = Object.create(proto, {
    objEnumTrue: { value: 1, enumerable: true },
    objEnumFalse: { value: 2, enumerable: false }
});
```

- `for-in` will only show enumerable properties, also from prototype chain
```
for (var x in obj) console.log(x);
objEnumTrue
protoEnumTrue
```

- `Object.keys(obj)` will get only enumerable property, but only its own
```
Object.keys(obj)
[ 'objEnumTrue' ]
```

- `Object.getOwnPropertyNames` will only get own properties, enumerable or not
```
Object.getOwnPropertyNames(obj)
[ 'objEnumTrue', 'objEnumFalse' ]
```




### Best Practices: Iterating over Own Properties
- with `for-in`
```
for (var key in obj) {
    if (Object.prototype.hasOwnProperty.call(obj, key)) {
        console.log(key);
    }
}
```

- with `object.keys`
```
Object.keys(obj).forEach(function (key) {
    console.log(key);
});
```



### Accessors (Getters and Setters)
- ECMAScript 5 lets you write methods whose invocations look like you are getting or setting a property
- they are not stored, but they are virtual
```
var obj = {
    val:null,
    get foo() {
        return val;
    },
    set foo(value) {
        val = value;
    }
};

obj.foo = 'asdf'
"asdf"
obj.foo
"asdf"
```


### Defining Accessors via Property Descriptors
```
var obj = Object.create(
    Object.prototype, {             // object with property descriptors
        foo: {                      // property descriptor
            get: function () {
                return 'getter';
            },
            set: function (value) {
                console.log('setter: '+value);
            }
        }
    }
);
```



### Accessors and Inheritance
- Getters and setters are inherited from prototypes:
```
var proto = { get foo() { return 'hello' } };
var obj = Object.create(proto);

obj.foo
'hello'
```



### Getting and Defining Properties via Descriptors
- `Object.getOwnPropertyDescriptor(obj, propKey)`
    - getting property descriptor of non-inherited property
    - if there is no such property then return `undefined`
```
Object.getOwnPropertyDescriptor(Object.prototype, 'toString')
{ value: [Function: toString],
  writable: true,
  enumerable: false,
  configurable: true }

Object.getOwnPropertyDescriptor({}, 'toString')
undefined       // because toString is not is own property
```

- `Object.defineProperty(obj, propKey, propDesc)`
    - can create or change property attribute
    - return the modified object
```
var obj = Object.defineProperty({}, 'foo', {
    value: 123,
    enumerable: true
    // writable: false (default value)
    // configurable: false (default value)
});
```

- `Object.defineProperties(obj, propDescObj)`
    - batch version of `Object.defineProperty()`
```
var obj = Object.defineProperties({}, {
    foo: { value: 123, enumerable: true },
    bar: { value: 'abc', enumerable: true }
});
```

- `Object.create(proto, propDescObj?)`
    - create an object who's porotype is `proto`
    - `propDescObj` is specified then add properties as `Object.defineProperties`
```
var obj = Object.create(Object.prototype, {
    foo: { value: 123, enumerable: true },
    bar: { value: 'abc', enumerable: true }
});
```



### Copying an Object
- to create an identical copy of object
    - it should be have the same proto as original
    - it must have same property and attributes
```
function copyObject(orig) {
    // 1. copy has same prototype as orig
    var copy = Object.create(Object.getPrototypeOf(orig));

    // 2. copy has all of orig’s properties
    copyOwnPropertiesFrom(copy, orig);

    return copy;
}

function copyOwnPropertiesFrom(target, source) {
    Object.getOwnPropertyNames(source)                                  // Get an array with the keys of all own properties of source.
    .forEach(function(propKey) {                                        // Iterate over those keys.
        var desc = Object.getOwnPropertyDescriptor(source, propKey);    // Retrieve a property descriptor.
        Object.defineProperty(target, propKey, desc);                   // Use that property descriptor to create an own property in target.
    });
    return target;
};
```



### Inherited Read-Only Properties Can’t Be Assigned To
- readonly property can be inherited but it cannot be change in strict mode
- however it can be in sloppy mode



### Enumerability: Best Practices
- General rule
    - properties created by system is non-enumerable
    - but properties created by user is enumerable

- should no use `for-in` as it will show enumerable from inherited objects
- should not add properties to build-in prototype and objects, if it needs to be added then add it non-enumerable




### Protecting Object
- Preventing extensions
    - `Object.preventExtensions(obj)`
    - makes it impossible to add properties to obj. For example:
```
var obj = { foo: 'a' };
Object.preventExtensions(obj);
```

- Now adding a property fails silently in sloppy mode:
```
obj.bar = 'b';
obj.bar
undefined
```

- and throws an error in strict mode:
```
(function () { 'use strict'; obj.bar = 'b' }());
TypeError: Can't add property bar, object is not extensible
```

- You can still delete properties, though:
```
delete obj.foo
true

obj.foo
undefined
```

- You check whether an object is extensible via:
```
Object.isExtensible(obj)
false
```

- Sealing
    - `Object.seal(obj)`
    - prevents extensions and makes all properties `un-configurable`
    - it's properties cannot be changed anymore
    - so readonly property stays readonly, meaning cannot be change by own object or by inherited object
```
var obj = { foo: 'a' };

Object.getOwnPropertyDescriptor(obj, 'foo')  // before sealing
{ value: 'a',
  writable: true,
  enumerable: true,
  configurable: true }

Object.seal(obj)

Object.getOwnPropertyDescriptor(obj, 'foo')  // after sealing
{ value: 'a',
  writable: true,
  enumerable: true,
  configurable: false }
```

- value can be changes
```
obj.foo = 'b';
'b'

obj.foo
'b'
```

- but properties cannot be changed
```
Object.defineProperty(obj, 'foo', { enumerable: false });
TypeError: Cannot redefine property: foo
```

- check if the object is sealed
```
Object.isSealed(obj)
```


- Freezing
    - seal the object, it will make all properties non-writable, they cannot change
    - object is not extensible
    - in strict mode it will give error
```
var point = { x: 17, y: -5 };
Object.freeze(point);

point.x = 2;  // no effect, point.x is read-only
point.x
17
```

- to check if the object is freeze
```
Object.isFrozen(obj)
```


### Pitfall: Protection Is Shallow
- some properties can be change
- array can be added or removed
```
var obj = {
    foo: 1,
    bar: ['a', 'b']
};
Object.freeze(obj);

obj.foo = 2;              // no effect
obj.bar.push('c');        // changes obj.bar

obj
{ foo: 1, bar: [ 'a', 'b', 'c' ] }

obj.bar.shift()           // remove first value
obj.bar
["b", "c"]
```


#######################################################################


### Layer 3: Constructors—Factories for Instances
- constructor function are named functions
- they correspond to classes in other languages
- the object created by constructor is called `instances`
- they are instantiated/invoked by `new` keyword
- if many objects are created from one constructor, they are 2 things in common
    - they well have their own properties
```
function Person(name) {
    this.name = name;
}
```

- but the behaviour will be shared between instances
```
Person.prototype.describe = function () {
    return 'Person named '+this.name;
};
```

- IMP, `Person` is a normal function, but becomes constructor when invoked with `new` keyword
- any instance can be check with `instanceof`



#### The new Operator Implemented in JavaScript
- when an object is created, is prototype is pointing to its parent
```
function C() {}
Object.getPrototypeOf(new C()) === C.prototype
true
```


#### The constructor Property of Instances
- each function has an instance of `prototype.constructor` which points back to its own function
```
function C() {}
C.prototype.constructor === C
true
```

- Because the constructor property is inherited from prototype, so we can check its constructor
```
var o = new C();
o.constructor
[Function: C]
```


#### Determining the name of an object’s constructor
- `.name` property can tell about the constructor name
```
function Foo() {}
var f = new Foo();
f.constructor.name
'Foo'
```

**NOTE** not all engine support `.name` property


#### Best practice
- make sure the function's constructor points to itself
```
C.prototype.constructor === C
```

- By default they already points to itself
```
function f() {}
f.prototype.constructor === f
true
```

- You should thus avoid replacing this object and only add properties to it:
```
// Avoid:
C.prototype = {
    method1: function (...) { ... },
};

// Prefer:
C.prototype.method1 = function (...) { ... };
```

- If you do replace it, you should manually assign the correct value to constructor:
```
C.prototype = {
    constructor: C,
    method1: function (...) { ... },
};
```



### The instanceof Operator
- instance of tells if the instance is created by function `constructor` or `subconstructor`
- both are same
```
value instanceof Constr
Constr.prototype.isPrototypeOf(value)

// examples

{} instanceof Object
true

[] instanceof Array  // constructor of []
true
[] instanceof Object  // super-constructor of []
true

new Date() instanceof Date
true
new Date() instanceof Object
true
```

- a primitive value is not an object, so it cannot be an instaceof an object
```
'abc' instanceof Object
false
123 instanceof Number
false
```

- instanceof throws an exception if its right side isn’t a function:
```
[] instanceof 123
TypeError: Expecting a function in instanceof check
```


#### Pitfall: objects that are not instances of Object
- any object which is an instance will have prototype chain `__proto__`
- however any object which dont have prototype chain `__proto__`, will not be an instance of object
```
Object.create(null) instanceof Object     // will not have __proto__
false

Object.prototype instanceof Object        // already a object prototype, so no __proto__, explained below
false
```

- Neither object has a prototype:
```
Object.getPrototypeOf(Object.create(null))
null

Object.getPrototypeOf(Object.prototype)
null
```

- But typeof correctly classifies them as objects:
```
typeof Object.create(null)
'object'

typeof Object.prototype
'object'
```



#### Pitfall: crossing realms (frames or windows)
- each frame/window has its own scope
- so global variables are present in there own frame/window
- Workaround
    - use `postMessage()` method to copy object to another realm



### Tips for Implementing Constructors



#### Protection against forgetting new: strict mode
- `strict` mode is use to restrict from calling constructor as a function
```
function SloppyColor(name) {
    this.name = name;
}
var c = SloppyColor('green'); // no warning!

// No instance is created:
console.log(c); // undefined
// A global variable is created:
console.log(name); // green
```

- how every in strict mode it will give error
```
function StrictColor(name) {
    'use strict';
    this.name = name;
}
var c = StrictColor('green');
// TypeError: Cannot set property 'name' of undefined
```



### Returning arbitrary objects from a constructor
- we can use factory pattern in js
```
function Expression(str) {
    if (...) {
        return new Addition(..);
    } else if (...) {
        return new Multiplication(...);
    } else {
        throw new ExpressionException(...);
    }
}

var expr = new Expression(someStr);
```



### Data in Prototype Properties


#### Avoid Prototype Properties with Initial Values for Instance Properties
- if a property is defined with prototype then that value will be shared among all instances
```
function Names(data) {
    if (data) {                 // if data is not defined
        this.data = data;       // then objects own property will not be created
    }
}
Names.prototype.data = [];      // then prototype property will be used

var n1 = new Names();
var n2 = new Names();

n1.data.push('jane');         // changes default value
n1.data
[ 'jane' ]

n2.data
[ 'jane' ]
```


#### Best practice: don’t share default values
- will assign the value passed or an empty array
```
function Names(data) {
    this.data = data || [];
}
```



#### Avoid Nonpolymorphic Prototype Properties
- Every constructor should access its own property or inherited property
- they should never use global variable



### Keeping Data Private
- Private Data in the Environment of a Constructor (Crockford Privacy Pattern)
- Private Data in Properties with Marked Keys
- Private Data in Properties with Reified Keys



#### Private Data in the Environment of a Constructor (Crockford Privacy Pattern)


#### Public properties
- they are properties which defined with `prototype`, which are accessible among all instances
```
Constr.prototype.publicMethod = ...
```

- they are properties which usually store data not method, which is unique to an instance
```
fuction Constr(){
    this.x = ...
}
```



### Private value
- they are present in constructor's environment and is accessible to constructor and their instances
- they are not available to prototype methods
```
function Constr(...) {
    ...
    var that = this; // make accessible to private functions

    var privateData = ...;

    function privateFunction(...) {
        // Access everything
        privateData = ...;

        that.publicData = ...;
        that.publicMethod(...);
    }
    ...
}
```



#### Privileged methods
- they are method which are declared inside constructor's environment with `this` keyword
- these method can access private data
- these private data cannot be accessed by `prototype` methods
```
function StringBuilder() {
    var buffer = [];
    this.add = function (str) {
        buffer.push(str);
    };
    this.toString = function () {
        return buffer.join('');
    };
}
// Can’t put methods in the prototype!

var sb = new StringBuilder();
sb.add('Hello');
sb.add(' world!');
sb.toString()
'Hello world!'
```



#### The pros and cons of the Crockford privacy pattern
- it completely secure
- it may be slower
- it costs more memory


### Private Data in Properties with Marked Keys
- the private is marked a private, like `_`
- they are accessible from outside
```
StringBuilder.prototype = {
    constructor: StringBuilder,
    add: function (str) {
        this._buffer.push(str);
    },
    toString: function () {
        return this._buffer.join('');
    }
};

var o = new StringBuilder;
o.add("one ")
o.add("two ")
log ( o.toString() );
'one two '

log (o._buffer)
[ 'one ', 'two ' ]
```

#### The pros and cons of
- It offers a more natural coding style
- pollutes namespace property, it is visible to everyone
- private property can be accessible from outside, which make is easy for unit testing
- they are some key clashes, with inheritance same key may create problems


### Private Data in Properties with Reified Keys
- this approach uses long variable key name, making it less prone to clashes
- encapsulating in IIFE will make the variable private and will not pollute the global namespace
- keys are kept unique with `UUID` like `var KEY_BUFFER = '_StringBuilder_buffer_' + uuid.v4();`
- and the key value has different value each time the code runs
```
var StringBuilder = function () {
    var KEY_BUFFER = '_StringBuilder_buffer';       // long key name, less likely to clashes

    function StringBuilder() {
        this[KEY_BUFFER] = [];
    }
    StringBuilder.prototype = {
        constructor: StringBuilder,
        add: function (str) {
            this[KEY_BUFFER].push(str);
        },
        toString: function () {
            return this[KEY_BUFFER].join('');
        }
    };
    return StringBuilder;
}();
```



### Keeping Global Data Private via IIFEs



#### Attaching private global data to a singleton object
- we can use IIFE without constructor to create a private and public method/properties
```
var obj = function () {  // open IIFE

    // public
    var self = {
        publicMethod: function (...) {
            privateData = ...;
            privateFunction(...);
        },
        publicData: ...
    };

    // private
    var privateData = ...;
    function privateFunction(...) {
        privateData = ...;
        self.publicData = ...;
        self.publicMethod(...);
    }

    return self;
}(); // close IIFE
```



#### Keeping global data private to all of a constructor
- `Reified Keys` approach with IIFE
```
var StringBuilder = function () { // open IIFE
    var KEY_BUFFER = '_StringBuilder_buffer_' + uuid.v4();

    function StringBuilder() {
        this[KEY_BUFFER] = [];
    }
    StringBuilder.prototype = {
        // Omitted: methods accessing this[KEY_BUFFER]
    };
    return StringBuilder;
}(); // close IIFE
```



#### Attaching global data to a method
- a global data can be used with closure and IIFE
```
var obj = {
    method: function () {  // open IIFE

        // method-private data
        var invocCount = 0;

        return function () {
            invocCount++;
            console.log('Invocation #'+invocCount);
            return 'result';
        };
    }()  // close IIFE
};

obj.method()
Invocation #1
'result'

obj.method()
Invocation #2
'result'
```



########################################################################



## Layer 4: Inheritance Between Constructors
- how the constructor can be inherited, from `super` to `sub`
- the new constructor has all the features of inherited constructor and also its own
- however there is no way to perform this in js, which needs to be done manually
    - it should inherit instance properties
    - it should inherit prototype properties
    - it should be instanceof `sub` and `super`
    - it could override method to adopt one `super` method in `sub`
    - also calling `super` method from `sub`



### Inheriting Instance Properties
- `super.call` will take first param as `this` and some arguments to make it work
```
function Super(prop1){
    this.prop1 = prop1;
}
Super.prototype.methodB = function(x){
    return this.prop1 = x * 2;
};


function Sub(prop) {
    this.prop2 = prop;
}
```



### Inheriting Prototype Properties
- we need to inherite all the `super` prototype properties to `sub` prototype
- this will be done by giving `super.prototype` to `sub.prototype`
- this will override the `sub` constructor we need to replace it back with its own
```
Sub.prototype = Object.create(Super.prototype);
Sub.prototype.constructor = Sub;
```



### Ensuring That instanceof Works
- that every instance of `Sub` must me an instance of `Super`
- so the first prototype chain of `sub` instance should have `Sub.prototype`
- and the second prototype chain of `sub` instance should have `Super.prototype`
```
var subIns = new Sub(2);

subIns instanceof Sub               // true
Sub.prototype.isPrototypeOf(subIns) // true

subIns instanceof Super
Super.prototype.isPrototypeOf(subIns)
```



### Overriding a Method
- method `methodB` is overridden by `sub`
- so it will search in `sub` before searching `Super`
**Note if `Sub.prototype.methodB` is declared before inheritance then `super.methodB` will be called**
```
Sub.prototype.methodB = function () {
    return 'sub';
}

subIns.methodB()
'sub'
```



### Making a Supercall
- it can be called with function prototype `call` method, invoking with `this`
```
Sub.prototype.methodB = function (x) {
    var superResult = Super.prototype.methodB.call(this, x);
    return this.prop2 + ' ' + superResult;
}
```



### Avoiding Hardcoding the Name of the Superconstructor
- when calling superMethods we need to call it by function name
- that makes it hard-code, we can make it little bit more flexible
```
Sub._super = Super.prototype;
```
- but the problem, we are not using prototype for inheritance, we can use different method
```
function copyOwnPropertiesFrom(target, source) {
    Object.getOwnPropertyNames(source)  // (1)
    .forEach(function(propKey) {  // (2)
        var desc = Object.getOwnPropertyDescriptor(source, propKey); // (3)
        Object.defineProperty(target, propKey, desc);  // (4)
    });
    return target;
};

function subclasses(SubC, SuperC) {
    var subProto = Object.create(SuperC.prototype);
    // Save `constructor` and, possibly, other methods
    copyOwnPropertiesFrom(subProto, SubC.prototype);
    SubC.prototype = subProto;
    SubC._super = SuperC.prototype;
};



function Person(name) {
    this.name = name;
}
Person.prototype.describe = function () {
    return 'Person called '+this.name;
};

function Employee(name, title) {
    Employee._super.constructor.call(this, name);
    this.title = title;
}
Employee.prototype.describe = function () {
    return Employee._super.describe.call(this)+' ('+this.title+')';
};
subclasses(Employee, Person);
```

**However traditional way using prototype**
```
function Person(name) {
    this.name = name;
}
Person.prototype.describe = function () {
    return 'Person called '+this.name;
};

function Employee(name, title) {
    Person.call(this, name);
    this.title = title;
}
Employee.prototype = Object.create(Person.prototype);
Employee.prototype.constructor = Employee;
Employee.prototype.describe = function () {
    return Person.prototype.describe.call(this)+' ('+this.title+')';
};

var jane = new Employee('Jane', 'CTO');

jane.describe()
Person called Jane (CTO)

jane instanceof Employee
true

jane instanceof Person
true
```



### Antipattern: The Prototype Is an Instance of the Superconstructor
- This is not recommended under ECMAScript 5
- The prototype will have all of Super’s instance properties, which it has no use for
```
Sub.prototype = new Super();  // Don’t do this
```



### Methods of All Objects
- `Object.prototype.toString()`
- return a string of an object
- arrays are also converted to string
```
({ first: 'John', last: 'Doe' }.toString())
'[object Object]'
[ 'a', 'b', 'c' ].toString()
'a,b,c'
```

- `Object.prototype.valueOf()`
- preferred way to convert object to number
```
var obj = {};
obj.valueOf() === obj
true
```



### Prototypal Inheritance and Properties
- `Object.prototype.isPrototypeOf(obj)`
    - return true if is first value on prototype chain is that object
```
var proto = { };
var obj = Object.create(proto);

proto.isPrototypeOf(obj)
true

obj.isPrototypeOf(obj)
false
```

- `Object.prototype.hasOwnProperty(key)`
    - return true if the it has it's own property
    - not the property in the its prototype
```
var proto = { foo: 'abc' };
var obj = Object.create(proto);
obj.bar = 'def';

Object.prototype.hasOwnProperty.call(obj, 'foo')
false
Object.prototype.hasOwnProperty.call(obj, 'bar')
true
```

- `Object.prototype.propertyIsEnumerable(propKey)`
    - return true if property is enumerable
    - properties which are accessible in `for-in`
```
var obj = { foo: 'abc' };

obj.propertyIsEnumerable('foo')
true

obj.propertyIsEnumerable('toString')
false

obj.propertyIsEnumerable('unknown')
false
```



### Generic Methods: Borrowing Methods from Prototypes
- we can borrow methods from prototype
- we can use `call` method to call these methods
- method `incAge` needs `age` property to run
- so we can use call method, pass object with `age` property and then call `incAge`
```
function Wine(age) {
    this.age = age;
}
Wine.prototype.incAge = function (years) {
    this.age += years;
}

var john = { age: 51 };
Wine.prototype.incAge.call(john, 3)
john.age
54
```

- this will also work with object literal
```
var Wine =  {
    age : 12,

    incAge :function (years) {
        this.age += years;
    }
}

var john = { age: 51 };
Wine.incAge.call(john, 3)
john.age
```



### Accessing Object.prototype and Array.prototype via Literals
- checking object's property
- below are all same
```
var obj = {propKey:"home"};
Object.prototype.hasOwnProperty.call(obj, 'propKey')
// true

({}).hasOwnProperty.call(obj, 'propKey')
// true

obj.hasOwnProperty('propkey')
// true
```

- Array to join string
- all are same in below example
```
var str = ['a', 'b', 'c'];

Array.prototype.join.call(str, '-')
'a-b-c'

([]).join.call(str, '-')
'a-b-c'

str.join('-')
'a-b-c'
```



### Examples of Calling Methods Generically
- Using `apply`
```
var arr1 = [ 'a', 'b' ];
var arr2 = [ 'c', 'd' ];

([]).push.apply(arr1, arr2)
4

arr1
[ 'a', 'b', 'c', 'd' ]
```

- `map`
```
[].map.call('abc', function (x) { return x.toUpperCase() })
[ 'A', 'B', 'C' ]
```

- `map` with `split`
```
'abc'.split('').map(function (x) { return x.toUpperCase() })
[ 'A', 'B', 'C' ]
```

- `Upperstring`
```
String.prototype.toUpperCase.call(true)
'TRUE'

String.prototype.toUpperCase.call(['a','b','c'])
'A,B,C'
```

- `join` on object
```
var fakeArray = { 0: 'a', 1: 'b', length: 2 };
Array.prototype.join.call(fakeArray, '-')
'a-b'
```

- `push` on object
```
var obj = {};
Array.prototype.push.call(obj, 'hello');
1
obj
{ '0': 'hello', length: 1 }
```



### Array-Like Objects and Generic Methods
- object which have index and also length
- and they dont have property of array `forEach, push, concat, join, etc`
- it is not and instance of array
    - `arguments` of function
```
function args() { return arguments }
var arrayLike = args('a', 'b');

arrayLike[0]
'a'
arrayLike.length
2

arrayLike.join('-')
TypeError: object has no method 'join'

arrayLike instanceof Array
false
```

- Dom node elements are also same objects/arrays
```
var elts = document.getElementsByTagName('h3');
elts.length
3
elts instanceof Array
false
```

- Strings
```
'abc'[1]
'b'

'abc'.length
3
```



### Patterns for working with array-like objects
- Turn an array-like object into an array:
```
var arr = Array.prototype.slice.call(arguments);
```

- To iterate over all elements of an array-like object, you can use a simple for loop:
```
function logArgs() {
    for (var i=0; i<arguments.length; i++) {
        console.log(i+'. '+arguments[i]);
    }
}
```

- array `forEach` can also be used
```
function logArgs() {
    Array.prototype.forEach.call(arguments, function (elem, i) {
        console.log(i+'. '+elem);
    });
}

logArgs('hello', 'world');
0. hello
1. world
```


### Pitfalls: Using an Object as a Map
- Since JavaScript has no built-in data structure for maps
- objects are often used as maps from strings to values
- it is more error-prone than it seems


#### Pitfall 1: Inheritance Affects Reading Properties
- some operator get all the properties from prototype chain and its own
```
var obj = {};
obj.ownProp = 'b';

'ownProp' in obj
true

'toString' in obj       // gettting from prototype of object
true
```

- some operators only get its own property
```
obj.hasOwnProperty('ownProp')  // ok
true

obj.hasOwnProperty('toString')  // ok
false
```



### Collecting property keys
- getting only it's own properties keys
```
Object.keys(obj)
[ 'ownProp' ]                   // not getting from prototype
```



### Getting a property value
- we can use `.` operator or `[]` to get its values
```
obj['toString']
[Function: toString]

obj.toString
[Function: toString]
```

- checking if the property is its own
```
function getOwnProperty(obj, propKey) {
    // Using hasOwnProperty() in this manner is problematic
    // (explained and fixed later)
    return (obj.hasOwnProperty(propKey) ? obj[propKey] : undefined);
}

getOwnProperty(obj, 'toString')
'undefined'
```


#### Cheat Sheet: Working with Objects
- Object literals
```
var jane = {
    name: 'Jane',

    'not an identifier': 123,

    describe: function () { // method
        return 'Person named '+this.name;
    },
};
// Call a method:
console.log(jane.describe()); // Person named Jane
```

- Dot operator
```
obj.propKey
obj.propKey = value
delete obj.propKey
```

- Bracket operator
```
obj['propKey']
obj['propKey'] = value
delete obj['propKey']
```

- Getting and setting the prototype
```
Object.create(proto, propDescObj?)
Object.getPrototypeOf(obj)
```

- Iteration and detection of properties
```
Object.keys(obj)
Object.getOwnPropertyNames(obj)

Object.prototype.hasOwnProperty.call(obj, propKey)
propKey in obj
```

- Getting and defining properties via descriptors
```
Object.defineProperty(obj, propKey, propDesc)
Object.defineProperties(obj, propDescObj)
Object.getOwnPropertyDescriptor(obj, propKey)
Object.create(proto, propDescObj?)
```

- Protecting objects
```
Object.preventExtensions(obj)
Object.isExtensible(obj)

Object.seal(obj)
Object.isSealed(obj)

Object.freeze(obj)
Object.isFrozen(obj)
```

- Methods of all objects
```
Object.prototype.toString()
Object.prototype.valueOf()

Object.prototype.toLocaleString()

Object.prototype.isPrototypeOf(obj)
Object.prototype.hasOwnProperty(key)
Object.prototype.propertyIsEnumerable(propKey)
```
