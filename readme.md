# Speaking JS ES5

## Part III

## Strings
- they are immutable
- each character is a 16-bit unit


### String Literals
- string literal is presented by single and double quotes



### Escaping in String Literals
- backslash i used for escaping and enables special features
- it can be used to to spread string on multiple lines
```
var str = 'written \
over \
multiple \
lines';
console.log(str === 'written over multiple lines'); // true

var str = 'written ' +
          'over ' +
          'multiple ' +
          'lines';
```

- Control characters:
    - \b is a backspace
    - \f is a form feed
    - \n is a line feed (newline)
    - \r is a carriage return
    - \t is a horizontal tab
    - \v is a vertical tab.

- NUL character in unicode
    - `\0`

- Hexadecimal also represented by backslash
- Unicode also represented by backslash



### Character Access
- 2 ways to get character
```
'abc'.charAt(1)
'b'

'abc'[1]
'b'
```


### Converting to string
- undefined to 'undefined'
- null to 'null'
- false to 'false'
- true to 'true'
- number to '123'
- object will be convert to primitive type and then to string
```
String({foo:"bar"})
"[object Object]"
```
- `JSON.stringfy()` can be used for objects, but it has limitations and cannot show value which it cannot handle

**Note**
- values which are converted to string sometimes cannot be converted back to its original value
```
String(false)
'false'

Boolean('false') // because non-empty string is treated as true
true
```


### Concatenating Strings
- using plus (+) operator
```
var str = '';
str += 'Say hello ';
```

- use array to push string and join it
```
var arr = [];
arr.push('Say hello ');
arr.push(7);
arr.join('')
'Say hello 7'
```


**Note**
- on some new engines use + operator internally, so on those engines + operators are faster then array method



### The Function String
- with `String` function
```
String(123)
'123'

typeof String('abc')  // no change
'string'
```

- with `new String()` constructor
```
new String(123)
[String: '123']

a == 123
true

a === 123
false

typeof new String('abc')
'object'
```


### String Constructor Method
- character code to string
```
String.fromCharCode(97, 98, 99)
'abc'
```
- use array of character code, then we need to use `apply`
```
String.fromCharCode.apply(null, [97, 98, 99])
'abc'
```


### String Instance Property length
```
'abc'.length
3
```


### String Prototype Methods
- get character by position, `String.prototype.charAt(pos)`
```
'abc'.charAt(1)
'b'

'abc'[1]
'b'
```

- getting 16 UTF-code unit, ascii code, `String.prototype.charCodeAt(pos)`
```
"asdfasdf".charCodeAt(3)
102
```

- return substring `String.prototype.slice(start, end?)`, **NOTE** first index is `0` index
```
'abc'.slice(2)
'c'

'abc'.slice(1, 2)
'b'

'abc'.slice(-2)
'bc'
```

- break string to array, `String.prototype.split(separator?, limit?)`
```
'a,  b,c, d'.split(',')  // string
[ 'a', '  b', 'c', ' d' ]

'a,  b,c, d'.split(/,/)  // simple regular expression
[ 'a', '  b', 'c', ' d' ]

'a,  b,c, d'.split(/, */)   // more complex regular expression
[ 'a', 'b', 'c', 'd' ]

'a,  b,c, d'.split(/, */, 2)  // setting a limit
[ 'a', 'b' ]

'test'.split()  // no separator provided
[ 'test' ]

'abc'.split('')
[ 'a', 'b', 'c' ]
```



### Transform
- remove white spaces and return too, `String.prototype.trim()`
```
'\r\nabc \t'.trim()
'abc'
```

- concat string, `String.prototype.concat(str1?, str2?, ...)`
```
'hello'.concat(' ', 'world', '!')
'hello world!'
```

- lower case `String.prototype.toLowerCase()`
- upper case `String.prototype.toUpperCase()`



### Search and Compare
- `indexOf`, will `-1` if not found , `String.prototype.indexOf(searchString, position?)`
```
'aXaX'.indexOf('X')
1

'aXaX'.indexOf('X', 2)
3
```

- `lastIndexOf`, same as indexOf but search from last, `String.prototype.lastIndexOf`



### Test, Match, and Replace with Regular Expressions
- `search` will return `-1` when not found
```
'-yy-xxx-y-'.search(/x+/)
4
```

- `match` will return array
    - will return with first value found if `/g` is not set
```
'-abb--aaab-'.match(/(a+)b/)
[ 'ab',
'a',
index: 1,
input: '-abb--aaab-' ]
```

    - if `/g` is set then it will check whole string
```
'-abb--aaab-'.match(/(a+)b/g)
[ 'ab', 'aaab' ]
```

- `replace`, will replace value, `String.prototype.replace(search, replacement)`
    - if `/g` is not set then only first will be replaced
```
'iixxxixx'.replace('i', 'o')
'oixxxixx'

'iixxxixx'.replace(/i/g, 'o')
'ooxxxoxx'
```

- `$` will allow to completely match the string
```
'iixxxixx'.replace(/i+/g, '($&)') // complete match
'(ii)xxx(i)xx'

'iixxxixx'.replace(/(i+)/g, '($1)') // group 1
'(ii)xxx(i)xx'
```
