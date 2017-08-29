# Speaking JS ES5

## Part III

## JavaScript’s Syntax

### Expression
- They produce something, right side of an assignment or function arguments
- `out = m ? true : false`  right side is an expression



### Statements
- They preform task, `loops` and `if` are statements
- A program is a sequence of statements



### Ambiguous expressions as statements
- object literal, with function assigned to variable
- Named function `function fo(){}`, this will create a function and assigned to a variable
- expression cannot start with `{` or keyword `function`



### Eval and object literal
- object literal in defined in parentheses, in eval function
```
eval('{ foo: 123 }')
123
eval('({ foo: 123 })')
{ foo: 123 }
```


### No semicolon after statement that end with a block
- loops, `for, while`
- Branching `if, switch, try, catch`
- function declaration



### Invoking Methods on Number Literals
- we can use one of the followings
```
1..toString()
1 .toString()  // space before dot
(1).toString()
1.0.toString()
```


### Strict mode
- function declaration cannot be inside another function declaration, but function expression will work
- However by personal test on crome and node function inside function works
- in this mode `this` in function will point to `undefined`, in normal it points to window/global object
- in normal function `this` will not work when funciton is called normally
** Note: if a funciton needs to called normally then `this` should not be used inside it**
```
function strictFunc() {
    'use strict';
    console.log(this === undefined);  // true
}

stricFunc()
```

- in strict mode, if `new` is not used with constructors to declare new object, it will throw error
- if `this` is used insede a function then normal call will not work, this type of function will be used to create instance
**Note: if a function has `this` inside it, then its instance should be created** 
```
function Point(x) {
    'use strict';
    this.x = x;
}
 var pt = Point(3);
TypeError: Cannot set property 'x' of undefined
```

- setting or deleting immutable properties will through exception
```
var str = 'abc';
function strictFunc() {
    'use strict';
    str.length = 7; // TypeError: Cannot assign to read-only property 'length'
}
```

- deleting unqualified identifiers (an object)
    - but we can use different method to delete object
```
delete window.foo;  // browsers
delete global.foo;  // Node.js
delete this.foo;    // everywhere (in global scope)
```

- Forbidden features in strict mode
    - `with` statement is not allowed anymore
    - octal numbers are not allowed `010`


########################################################################

## Values



### JS 6 types
- undefined, null
- bool, string, number
    - when strictly checked it will return true
- objects
    - when strictly checked it will return false, as all object have unique identity



### Primitive Values
- undefined, null, bool, string, number
- always immutable
    - their property cannot be change, removed or added
```
var str = 'abe'
str.lenght = 9          // will not owrk
str.foo = "new value"   // will not owrk
str.foo                 // will not owrk
```


### Nonprimitive values (Objects)
- objects, created by object literal
- Array, created by array literal
- Regular expression, Regular expression literal



#### Object characteristics
- all objects have unique identity, so they are never same
- they are mutable, property can be added, deleted and changed
- user-extensible, constructors can be created and used



### Nonvalue (undefined and null)
- they are neither primitive nor object
- `undefined`, means `no value`
    - uninitialized variable, missing param, missing property will return undefined
- `null`, means `no object`,
    - `null` is assigned
    - `null` in the last element in pototype chain
    - `null` is returned when `RegExp.prototype.exec()` dont match anything in a string



### Checking undefined and null
- by checking both
```
if(x !== undefined && x !== null)
```

- by checking truthly or falsy
```
if(x){}
if(!x){}
```
**Note**
- `false, 0, NaN, ""` are also falsy



### Wrapper Objects for Primitives
- primitive type constructors return object type, with `new` operator
    - `new` operator creates an object, `new` operator is used with constructor
- but without `new` operator they will turn specific type
```
typeof new String('abc')
'object'
typeof String(123)
'string'
```

**Note**
- we need to avoid object wrapper
- wrapper objects are not primitives, they return object, and objects are never equal



### Wrapping primitives
- the only use case is that we can use them to add properties



### Extracting values form wrapped objects
- they will not work for `boolean`
```
Boolean(new Boolean(false))  // does not unwrap
true
Number(new Number(123))  // unwraps
123
String(new String('abc'))  // unwraps
'abc'
```



### Primitives Borrow Their Methods from Wrappers
- so
```
'abc'.charAt === String.prototype.charAt
true
```

- Sloppy mode `this` will point to `String` object
```
String.prototype.sloppyMethod = function () {
    console.log(typeof this); // object
    console.log(this instanceof String); // true
};
''.sloppyMethod(); // call the above method
```

- In strict mode `this` will point to `string` which is before `.` Dot
```
String.prototype.strictMethod = function () {
    'use strict';
    console.log(typeof this); // string
    console.log(this instanceof String); // false
};
''.strictMethod(); // call the above method
```


### Type Coercion
- which convert the type of a value to another
- like when number in string are multiplied they will be converted to number
```
'3' * '4'
12
```
- and if one is string and plus is used it will be converted to string
```
3 + ' times'
'3 times'
```


### Functions for Converting to Boolean, Number, String, and Object



#### Boolean
- following values are converted to false
    - undefined, null
    - false
    - 0, NaN
    - ""
- all other values are converted to true, including objects



#### Number
- conversion
    - undefined becomes NaN
    - null becomes 0
    - false becomes 0
    - true becomes 1
    - string are parsed
    - Objects are first converted to primitives, which are then converted to numbers.



#### String
- Objects are first converted to primitives, which are then converted to strings.
```
String(null)
'null'

String(123.45)
'123.45'

String(false)
'false'

String({name:"obj"})
"[object Object]"
```


#### Objects
- objects of primitives return there wrapper functions
```
Object(123)
Number {[[PrimitiveValue]]: 123}

Object('abc') instanceof String
true

var obj = { foo: 123 };
Object(obj) === obj
true

Object(false)
Boolean {[[PrimitiveValue]]: false}
```

- but undefined and null will return empty object
```
Object(null)
{}

Object(undefined)
{}
```


### Algorithm: ToPrimitive()—Converting a Value to a Primitive
- ToPrimitive() is not present in javascript
    - `ToPrimitive(input, PreferredType?)`
- If `PreferredType` is Number, then you perform the following steps:
    - If input is primitive, return it (there is nothing more to do).
    - Otherwise, input is an object. Call input.valueOf(). If the result is primitive, return it.
    - Otherwise, call input.toString(). If the result is primitive, return it.
    - Otherwise, throw a TypeError (indicating the failure to convert input to a primitive).

```
var empty = {};
empty.valueOf()
{}
empty.toString()
"[object Object]" // string returned
```