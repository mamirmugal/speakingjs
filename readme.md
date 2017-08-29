# Speaking JS ES5

## Part III

## Numbers
- it is double(64bit) and represented as floating value
- number literal can be integer, floating point or hexadecimal
- invoking methods on literal
```
123..toString()
123 .toString()  // space before the dot
123.0.toString()
(123).toString()
```


## Converting to Number
- undefined to NaN
- null to 0
- false to 0
- true to 1
- string is parsed, number to number
- converts to resulting primitive, NaN
```
Number('')
0
Number('123')
123
Number('\t\v\r12.34\n ')  // ignores leading and trailing whitespace
12.34

Number(false)
0
Number({foo:"bar"})
NaN
```


## ParseFloat()
- use `Number()` instead of `ParseFloat()`

```
parseFloat(true)  // same as parseFloat('true')
NaN
Number(true)
1

parseFloat(null)  // same as parseFloat('null')
NaN
Number(null)
0
```

- but will create problem if leading or use of illegal character with number
```
parseFloat('123.45#')
123.45
Number('123.45#')
NaN
```


## Special Number Values
- NaN
    - NaN meaning `Not a number` is actually a number
```
typeof NaN
'number'
```

- parsing error
```
Number('xyz')
NaN
Number(undefined)
NaN
```

- An operation failed
```
Math.acos(2)
NaN
Math.log(-1)
NaN
```

- any operation dealing with `NaN`
```
NaN + 3
NaN
25 / NaN
NaN
```

- `isNaN` will not work on strings
```
isNaN('xyz')
true
```

#### Infinity
- is actually an error
- number which has very large value, so it will show `infinity`
```
Infinity - Infinity
NaN
Infinity / Infinity
NaN

Infinity + Infinity
Infinity
Infinity * Infinity
Infinity
```

- anything divided by zero
```
3 / 0
Infinity
3 / -0
-Infinity
```

- `isFinite()` to check if value is finite
```
isFinite(5)
true
isFinite(Infinity)
false
isFinite(NaN)
false
```

- As js has 2 zeros, we should always assume it has one zero
```
-0
0
(-0).toString()
'0'
(+0).toString()
'0'
+0 === -0
true
```


## Integers in JavaScript
- integer is upt 53 bit magnitude


## Converting to Integer
- all number are float
    - convert to integer with `Math.floor()`, `Math.ceil()` and `Math.round()`
```
Math.floor(3.8)
3
Math.floor(-3.8)
-4

Math.ceil(3.2)
4
Math.ceil(-3.2)
-3

Math.round(3.2)
3
Math.round(3.5)
4
Math.round(3.8)
4

Math.round(-3.2)
-3
Math.round(-3.5)
-3
Math.round(-3.8)
-4
```


- Integer with custom method `ToInteger()`
	- it is internal ECMAScript
	
```
ToInteger(3.2)
3
ToInteger(3.5)
3
ToInteger(3.8)
3
ToInteger(-3.2)
-3
ToInteger(-3.5)
-3
ToInteger(-3.8)
-3
```


### Arithmetic Operators
- if any one of them is string other is converted to string and added to it
```
3.1 + 4.3
7.4
4 + ' messages'
'4 messages'
'10' + 10 + 12
101012
10 + '10' + 12
101012
```


### Bitwise Operators
- they work on 32-bit integer and generate 32-bit result


### The Function Number
- convert string to number
```
Number('123')
123
typeof Number(3)  // no change
'number'
```

- but with new operator it's type is `object`
```
typeof new Number(3)
'object'
```


### Number Constructor Properties
- Number.MAX_VALUE
- Number.MIN_VALUE
- Number.NaN
- Number.NEGATIVE_INFINITY
- Number.POSITIVE_INFINITY


### Number Prototype Methods
- Number.prototype.toFixed
    - will fix the length of the number
```
0.0000003.toFixed(10)
'0.0000003000'
```


### Functions for Numbers
- isFinite(number)
    - Checks whether number is an actual number
- isNaN(number)
    - Returns true if number is NaN
- parseFloat(str)
    - turns string into floating point number
- parseInt(str)
    - turn string to integer
