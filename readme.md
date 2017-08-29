# Speaking JS ES5

## Part III

## Booleans



### Converting to Boolean
- undefined to false
- null to false
- 0 and Nan to false,
    - rest to true
- '' to false
    - rest to true
- object to true



### Truthy and falsy
- undefined, null, 0, NaN, '' are `falsy`
- rest are all truthy
    - empty object, array even `new Boolean(false)`



### Logical operator
- OR (||)
    - if first is `true` then return first, else second
    - can also be used with `null or undefined` value
        - `value || defaultValue`
        - `foo( bar || "bar")`
- AND (&&)
    -  if first is `false` then return first, else second



### Logical Not (!)
```
!true
false

!43
false

!''
true

!{}
false
```

### Function Boolean
- with boolean function
```
Boolean(0)
false

typeof Boolean(false)  // no change
'boolean'
```

- with new boolean function
```
typeof new Boolean(false)
'object'
```