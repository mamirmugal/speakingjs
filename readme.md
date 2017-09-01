# Speaking JS ES5

## Part III

## Dates

- Date constructor helps with parsing, managing and displaying dates.

### The Date Constructor
- there are 4 ways to invoke date constructor

- `new Date(year, month, date?, hours?, minutes?, seconds?, milliseconds?)`
    - year: For 0 ≤ year ≤ 99, 1900 is added.
    - month: 0–11 (0 is January, 1 is February, etc.)  // copied from java
    - date: 1–31
    - hours: 0–23
    - minutes: 0–59
    - seconds: 0–59
    - milliseconds: 0–999
```
new Date(2001, 1, 27, 14, 55)
Date {Tue Feb 27 2001 14:55:00 GMT+0100 (CET)}

new Date(01, 1, 27, 14, 55)
Date {Wed Feb 27 1901 14:55:00 GMT+0100 (CET)}
```

- `new Date(dateTimeStr)`
    - convert the string to number, and `new Date(number)` is invoked
    - illegal date string lead to `NaN`
    - month are parse to number as well
```
new Date('2004-08-29')
Date {Sun Aug 29 2004 02:00:00 GMT+0200 (CEST)}

new Date('may 12 1989');
Fri May 12 1989 00:00:00 GMT+0500 (PKT)
```

- `new Date(timeValue)`
    - `timeValue` is milliseconds
    - using `geTime()` will convert the date back to milliseconds
```
new Date(0);
Thu Jan 01 1970 05:00:00 GMT+0500 (PKT)

new Date(1001);
Thu Jan 01 1970 05:00:01 GMT+0500 (PKT)

new Date(123).getTime()
123
```

- `new Date()`
    - creates an object of current date and time



## Date Constructor Methods
- `Date.now()`
    - return the current date in milliseconds

- `Date.parse(dateTimeString)`
    - convert the string to milliseconds
    - it will return `NaN` if the string is invalid

- `Date.UTC(year, month, date?, hours?, minutes?, seconds?, milliseconds?)`
    - converts it to milliseconds, wit specific timezone
    - it returns number not date object
    - and the time zone is as specified



## Date Prototype Methods
- `Date.prototype.get«Unit»()` returns Unit, according to local time
- `Date.prototype.set«Unit»(number)` sets Unit, according to local time.
- `Date.prototype.getUTC«Unit»()` returns Unit, according to universal time.
- `Date.prototype.setUTC«Unit»(number)` sets Unit, according to universal time.
- `Unit` can be one of he following words
    - `FullYear`: Usually four digits
    - `Month`: Month (0–11)
    - `Date`: Day of the month (1–31)
    - `Day` (getter only): Day of the week (0–6); 0 is Sunday
    - `Hours`: Hour (0–23)
    - `Minutes`: Minutes (0–59)
    - `Seconds`: Seconds (0–59)
    - `Milliseconds`: Milliseconds (0–999)
```
var d = new Date('1968-11-25');
Date {Mon Nov 25 1968 01:00:00 GMT+0100 (CET)}
d.getDate()
25
d.getDay()
1
```



### Various Getters and Setters
- `Date.prototype.getTime()`
    - will get time specified in milliseconds since 1 Jan 1970 
- `Date.prototype.setTime(timeValue)` 
    - will set time specified in milliseconds since 1 Jan 1970 
- `Date.prototype.valueOf()` 
    - is save as `getTime()`
- `Date.prototype.getTimezoneOffset()`
    - return the difference between local time and UTC 
```
(new Date).getTimezoneOffset()
-300 // 5 hours
```



### Convert a Date to a String
- Time
    - `Date.prototype.toTimeString()`
        - `17:43:07 GMT+0100 (CET)`
    - `Date.prototype.toLocaleTimeString()`
        - `17:43:07`

- Date
    - `Date.prototype.toDateString()`
        - `Tue Oct 30 2001`
    - `Date.prototype.toLocaleDateString()`
        - `10/30/2001`
 
- Date and time
    - `Date.prototype.toString()`
        - `Tue Oct 30 2001 17:43:07 GMT+0100 (CET)`
    - `Date.prototype.toLocaleString()`
        - `Tue Oct 30 17:43:07 2001`
    - `Date.prototype.toUTCString()`
        - `Tue, 30 Oct 2001 16:43:07 GMT`

- Date and time (machine-readable)
    - `Date.prototype.toISOString()`
        - `2001-10-30T16:43:07.856Z`
    - `Date.prototype.toJSON()`
        - same as toISOString method
        
        
        
        
## Date Time Formats
- `Date.parse()` can parse the formats.
- `new Date()` can parse the formats.
- `Date.prototype.toISOString()` creates a string machine readable



### Date Formats (No Time)
-  They include the following parts:
    - `YYYY` refers to year (Gregorian calendar).
    - `MM` refers to month, from 01 to 12.
    - `DD` refers to day, from 01 to 31.
```
new Date('2001-02-22')
Date {Thu Feb 22 2001 01:00:00 GMT+0100 (CET)}
```



### Time Formats (No Date)
- format
```
THH:mm:ss.sss
THH:mm:ss.sssZ

THH:mm:ss
THH:mm:ssZ

THH:mm
THH:mmZ
```
- `T` is prefix of time part
- `Z` refers to time zone
    - `Z` is to UTC
```
new Date('T13:17')
Date {Thu Jan 01 1970 13:17:00 GMT+0100 (CET)}
```
 


## Time Values: Dates as Milliseconds Since 1970-01-01
- `new Date(timeValue)` uses a time value to create a date.
- `Date.parse(dateTimeString)` parses a string with a date time string and returns a time value.
- `Date.now()` returns the current date time as a time value.
- `Date.UTC(year, month, date?, hours?, minutes?, seconds?, milliseconds?)` interprets the parameters relative to UTC and returns a time value.
- `Date.prototype.getTime()` returns the time value stored in the receiver.
- `Date.prototype.setTime(timeValue)` changes the date as specified via a time value.
- `Date.prototype.valueOf()` returns the time value stored in the receiver. This method determines how dates are converted to primitives, as explained in the next subsection.
```
new Date(0)
Date {Thu Jan 01 1970 01:00:00 GMT+0100 (CET)}

new Date(24 * 60 * 60 * 1000)  // 1 day in ms
Date {Fri Jan 02 1970 01:00:00 GMT+0100 (CET)}

new Date(-315532800000)
Date {Sat Jan 02 1960 01:00:00 GMT+0100 (CET)}
```


### Converting a Date to a Number
- they are converted to number so arithmetic operations can be used
```
new Date('1980-05-21') new Date('1980-05-20')
true

new Date('1980-05-21') - new Date('1980-05-20')
86400000
```


