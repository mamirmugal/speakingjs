# Speaking JS ES5

## Part III

## Operators
- operators work only on primitives
- objects are converted to primitives and then operations are applied
- so Array is converted to string and then operation are applied
```
[1, 2] + [3]
'1,23'
String([1, 2])
'1,2'
String([3])
'3'
```


### Assignment Operators
- `x = y = 0;`
- use strict equality `= = =` and inequality `!==`, except for `NaN`
- `NaN !== NaN`, even though `NaN` is not an `object` it is a `number`
- number are first converted to bool and then compared
```
2 == true  // 2 === 1
false
2 == false  // 2 === 0
false

1 == true  // 1 === 1
true
0 == false  // 0 === 0
true
```

- String comparison will be converted to bool and then compared
```
'' == false   // 0 === 0
true
'1' == true  // 1 === 1
true
'2' == true  // 2 === 1
false
'abc' == true  // NaN === 1
false
```

- Sometimes leniency will also work
```
'abc' == new String('abc')  // 'abc' == 'abc'
true
'123' == 123  // 123 === 123
true

'' == 0  // 0 === 0
true

{} == '[object Object]'
true
['123'] == 123
true
[] == 0
true
```

- Objects are not equal, so are wrapper objects
```
new Boolean(true) === new Boolean(true)
false
new Number(123) === new Number(123)
false
```


## The Plus Operator (+)
- any value is added to string will be converted to string
```
'foo' + 3
'foo3'
3 + 'foo'
'3foo'

'Colors: ' + [ 'red', 'green', 'blue' ]
'Colors: red,green,blue'
```

- otherwise it will be converted to number
```
3 + 1
4
3 + true
4
```


#### The void Operator
- void is same as `undefined`
- void operator returns `undefined` on all values
- but when a number is added to `undefined` it will give `NaN`
```
void 0
undefined
void (0)
undefined

void 4+7  // same as (void 4)+7
NaN
void (4+7)
undefined
```

- it can be used to discard the results, where `undefined` cannot be used
```
javascript:void window.open("http://example.com/")
```


#### Typeof
- it will return string representation of the type of value
- it will return `object` with `null`
- to check if the value is an `object`
```
function isObject(value) {
    return (value !== null && (typeof value === 'object' || typeof value === 'function'));
}
```


#### Instanceof
- checking if the value has a created constructor with given value
```
{} instanceof Object
true
[] instanceof Array  // constructor of []
true
[] instanceof Object  // super-constructor of []
true

undefined instanceof Object
false
null instanceof Object
false
```

- even though `typeof null` returns object but `instanceof` will not return it as an object, because null dont have `constructor`

