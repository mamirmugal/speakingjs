# Speaking JS ES5

## Part III

## Math

## Numerical Functions
- `Math.abs(x)`
    - Returns the absolute value of x

- `Math.ceil(x)`
    - Returns the smallest integer ≥ x
```
> Math.ceil(3.999)
4

> Math.ceil(3.001)
4

> Math.ceil(-3.001)
-3

> Math.ceil(3.000)
3
```

- `Math.floor(x)`
    - Returns the largest integer ≤ x
```
> Math.floor(3.999)
3

> Math.floor(3.001)
3

> Math.floor(-3.001)
-4

> Math.floor(3.000)
3
```

- `Math.pow(x, y)`
    - Returns x<sup>y</sup>, x raised to the power of y
```
> Math.pow(9, 2)
81

> Math.pow(36, 0.5)
6
```

- `Math.round(x)`
    - Returns x rounded to the nearest integer
```
> Math.round(3.999)
4

> Math.round(3.001)
3

> Math.round(3.5)
4

> Math.round(-3.5)
-3
```

- `Math.sqrt(x)`
    - Returns the square root of x
```
> Math.sqrt(256)
16
```



## Trigonometric Functions
- From degrees to radians
```
function toRadians(degrees) {
    return degrees / 180 * Math.PI;
}

> toRadians(180)
3.141592653589793

> toRadians(90)
1.5707963267948966
```

- From radians to degrees
```
function toDegrees(radians) {
    return radians / Math.PI * 180;
}

> toDegrees(Math.PI * 2)
360

> toDegrees(Math.PI)
180
```

- `Math.acos(x)`
    - Returns the arc cosine of x.
    
- `Math.asin(x)`
    - Returns the arc sine of x.
    
- `Math.atan(x)`
    - Returns the arc tangent of x.
    
- `Math.atan2(y, x)`
    - Returns the arc tangent of the quotient .
    
- `Math.cos(x)`
    - Returns the cosine of x.
    
- `Math.sin(x)`
    - Returns the sine of x.
    
- `Math.tan(x)`
    - Returns the tangent of x.
    



## Other Functions
- `Math.min(x1?, x2?, ...)`
    - Returns the smallest number among the parameters
```
> Math.min()
Infinity

> Math.min(27)
27

> Math.min(27, -38)
-38

> Math.min(27, -38, -43)
-43

> Math.min.apply(null, [27, -38, -43])
-43
``` 

- `Math.max(x1?, x2?, ...)`
    - Returns the largest number among the parameters
```
> Math.max()
-Infinity

> Math.max(7)
7

> Math.max(7, 10)
10

> Math.max(7, 10, -333)
10

> Math.max.apply(null, [7, 10, -333])
10
```

