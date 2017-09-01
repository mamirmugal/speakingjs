# Speaking JS ES5

## Part III

## Regular Expressions


## Regular Expression Syntax

### Atoms: General

### All of them have a special meaning
- `\ ^ $ . * + ? ( ) [ ] { } |`
- using `\` to escape them
```
/^(ab)$/.test('(ab)')
false

/^\(ab\)$/.test('(ab)')
true
```

### Pattern characters

### . (dot)
- matches any character, except for terminators (newline, carriage, return)
```
/./.test('\n')
false

/[\s\S]/.test('\n')
true
```



### Character escapes (match single characters)
- Specific control characters include \f (form feed), \n (line feed, newline), \r (carriage return), \t (horizontal tab), and \v (vertical tab)
- \0 matches the NUL character (\u0000)
- Any control character: \cA – \cZ
- Unicode character escapes: \u0000 – \xFFFF
- Hexadecimal character escapes: \x00 – \xFF



### Atoms: Character Classes
- [«charSpecs»] matches any single character that matches at least one of the charSpecs.
- [^«charSpecs»] matches any single character that does not match any of the charSpecs.



### Atoms: Groups
- («pattern») is a capturing group
- (?:«pattern») is a noncapturing group
```
/^(a+)-\1$/.test('a-a')
true

/^(a+)-\1$/.test('aaa-aaa')
true

/^(a+)-\1$/.test('aa-a')
false
```



### Quantifiers
- ? means match never or once.
- * means match zero or more times.
- + means match one or more times.
- {n} means match exactly n times.
- {n,} means match n or more times.
- {n,m} means match at least n, at most m, times.
- By default, quantifiers are greedy; that is, they match as much as possible
```
'<a<strong>'.match(/^<(.*)>/)[1]  // greedy
'a<strong'

'<a<strong>'.match(/^<(.*?)>/)[1]  // reluctant
'a'
```



### Assertions
- `^` Matches only at the beginning of the input.
- `$` Matches only at the end of the input.
- `\b` Matches only at a word boundary. Don’t confuse with [\b], which matches a backspace.
- `\B` Matches only if not at a word boundary.
- `(?=«pattern»)` Positive lookahead: Matches only if pattern matches what comes next. pattern is used only to look ahead, but otherwise ignored.
- `(?!«pattern»)` Negative lookahead: Matches only if pattern does not match what comes next. pattern is used only to look ahead, but otherwise ignored.
- This example matches a word boundary via \b:
```
/\bell\b/.test('hello')
false

/\bell\b/.test('ello')
false

/\bell\b/.test('ell')
true
```

- This example matches the inside of a word via \B:
```
/\Bell\B/.test('ell')
false

/\Bell\B/.test('hell')
false

/\Bell\B/.test('hello')
true
```



### Disjunction
- or operator
```
/^aa|bb$/.test('aaxx')
true

/^aa|bb$/.test('xxbb')
true
```



## Creating a Regular Expression
- can use literal or constructor
```
/abc/.test('ABC')
false

new RegExp('abc').test('ABC')
false


/abc/i.test('ABC')
true

new RegExp('abc', 'i').test('ABC')
true
```



### RegExp.prototype.test
- The test() method checks whether a regular expression, regex, matches a string
```
var str = '_x_x';

/x/.test(str)
true

/a/.test(str)
false
```

- If the flag /g is set, then the method returns true as many times as there are matches for regex in str
```
var regex = /x/g;
regex.lastIndex
0

regex.test(str)
true
regex.lastIndex
2

regex.test(str)
true
regex.lastIndex
4

regex.test(str)
false
```


### String.prototype.search
- The search() method looks for a match with regex within str
```
str.search(regex)
```

- If there is a match, the index where it was found is returned.
- Otherwise, the result is -1.
```
'abba'.search(/b/)
1

'abba'.search(/x/)
-1
```

- If the argument of search() is not a regular expression, it is converted to one:
```
'aaab'.search('^a+b+$')
0
```


## RegExp.prototype.exec: Capture Groups
- The following method call captures groups while matching regex against str
```
var matchData = regex.exec(str);
```
- If there was no match, matchData is null.
- Otherwise, matchData is a match result, an array with two additional properties:
    - `Array elements`
        - Element 0 is the match for the complete regular expression (group 0, if you will).
        - Element n 1 is the capture of group n.
    - `Properties`
        - `input` is the complete input string.
        - `index` is the index where the match was found.



### First Match (Flag /g Not Set)
- If the flag /g is not set, only the first match is returned:
```
var regex = /a(b+)/;
regex.exec('_abbb_ab_')
[ 'abbb',
  'bbb',
  index: 1,
  input: '_abbb_ab_' ]
regex.lastIndex
0
```


### All Matches (Flag /g Set)
- If the flag /g is set, all matches are returned if you invoke exec() repeatedly.
```
var regex = /a(b+)/g;
var str = '_abbb_ab_';

regex.exec(str)
[ 'abbb',
  'bbb',
  index: 1,
  input: '_abbb_ab_' ]
regex.lastIndex
6

regex.exec(str)
[ 'ab',
  'b',
  index: 7,
  input: '_abbb_ab_' ]
regex.lastIndex
10

regex.exec(str)
null
```



## String.prototype.match: Capture Groups or Return All Matching Substrings
- The following method call matches regex against str
```
var matchData = str.match(regex);
```

- If the flag /g of regex is not set, this method works like RegExp.prototype.exec()
```
'abba'.match(/a/)
[ 'a', index: 0, input: 'abba' ]
```

- If the flag is set, then the method returns an array with all matching substrings in str or null if there is no match
```
'abba'.match(/a/g)
[ 'a', 'a' ]

'abba'.match(/x/g)
null
```



## String.prototype.replace: Search and Replace
- The replace() method searches a string, str, for matches with search and replaces them with replacement
```
str.replace(search, replacement)
```

- `search`
    - String: To be found literally in the input string. Be warned that only the first occurrence of a string is replaced. If you want to replace multiple occurrences, you must use a regular expression with a /g flag. This is unexpected and a major pitfall.
    - Regular expression: To be matched against the input string. Warning: Use the global flag, otherwise only one attempt is made to match the regular expression.

- `replacement`
    - String: Describes how to replace what has been found.
    - Function: Computes a replacement and is given matching information via parameters.



### Replacement Is a String
- If replacement is a string, its content is used verbatim to replace the match. The only exception is the special character dollar sign ($), which starts so-called replacement directives:
- Groups: $n inserts group n from the match. n must be at least 1 ($0 has no special meaning).
- The matching substring:
    - $` (backtick) inserts the text before the match.
    - $& inserts the complete match.
    - $' (apostrophe) inserts the text after the match.
- $$ inserts a single $.

```
'axb cxd'.replace(/x/g, "[$`,$&,$']")
'a[a,x,b cxd]b c[axb c,x,d]d'

'"foo" and "bar"'.replace(/"(.*?)"/g, '#$1#')
'#foo# and #bar#'
```