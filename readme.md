# Speaking JS ES5

## Part III

## JSON
- Javascript Object Notation
- is a plain text for data storage
- used in data exchange format for web servers

### JSON expression
- Compound 
    - object of json data and array of json data
- Atomic
    - Strings, numbers, boolean, and null
    
- Sting must be in double quoted
- property must be in double quotes
- no single quotes allowed



## JSON.stringify(value, replacer?, space?)
- `replacer` is a callback method or filter applied to json object when converting to string
```angular2html
function replacer(key, value) {
    if (typeof value === 'number') {
        value = 2 * value;
    }
    return value;
}

> JSON.stringify({ a: 5, b: [ 2, 8 ] }, replacer)
'{"a":10,"b":[4,16]}'
```

- second param can also white list keys in objects
```angular2html
> JSON.stringify({foo: 1, bar: {foo: 1, bar: 1}}, ['bar'])

'{"bar":{"bar":1}}'
```
- third param will add new lines to the output
```angular2html
> console.log(JSON.stringify({a: 0, b: ['\n']}, null, 2))
{
  "a": 0,
  "b": [
    "\n"
  ]
}
```
 


### Data Ignored by JSON.stringify()
- json.stringify only considers enumerable properties
```angular2html
> var obj = Object.defineProperty({}, 'foo', { enumerable: false, value: 7 });
> Object.getOwnPropertyNames(obj)
[ 'foo' ]

> obj.foo
7

> JSON.stringify(obj)
'{}'
``` 

- cannot consider `functions`
 ```angular2html
> JSON.stringify(function () {})
undefined
```

- unsupported are ignored
```angular2html
> JSON.stringify({ foo: function () {} })
'{}'
```

- Unsupported values in arrays are stringified as nulls
```angular2html
> JSON.stringify([ function () {} ])
'[null]'
```



## JSON.parse(text, reviver?)
- it parse data in text and return js value
```angular2html
> JSON.parse("'String'") // illegal quotes
SyntaxError: Unexpected token ILLEGAL

> JSON.parse('"String"')
'String'

> JSON.parse('123')
123

> JSON.parse('[1, 2, 3]')
[ 1, 2, 3 ]

> JSON.parse('{ "hello": 123, "world": 456 }')
{ hello: 123, world: 456 }
```

