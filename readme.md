
# Functions

## Return value
- js always returns value, if not specified then it returns `undefined`
- so when we `console.log` it also return undefined


## Hoisting
- the functions will be hoisted with it is interpreted
- variable are also hoisted by there declaration is hoisted not their definition, so we need to manually hoist the variable and also declare them.


## Function expression
- hoisting will not work in function expression
- so we need to declare the function before it is used


# Array

## Foreach
- `array.forEach(myFun)`
```
function myFun(element, index, array){
...
}
```

## Map
- will iterate through an array and return every single value
- creating a new array


# Objects

## Property Name
- object literal the object property key should start with char not number
- should not use `-` or spaces ` ` as property key name
- workaround is using camel casing


