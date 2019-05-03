# Client Apps

IMPORTANT! Read this first!
This readme will contain an important information

## **Local Storage Usage**

In this app, we will use localStorage to track the login information.
The name of the key is `tokoDoto`

Type:

```typescript
type tokoDoto = {
  isLogin: boolean;
  userData: {
    userID: string;
  };
};
```

Default value:

```javascript
let tokoDoto = {
  isLogin: false,
  userData: {
    userID: '',
  },
};
```

### **Helper Function**

There is a helper function for localStorage purpose. It's located in `views/includes/general/localStorageHelper`

To use it, add the following line to your `CI_Controller`

```php
$data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);
```

Then, in your view html add this following line above your js

```html
<?php echo $localStorageHelper ?>
```

That's it and you are ready to go!

### **Helper Function Usage**

There is several method that you can use in your js file from this helper

#### `checkLocalStorage()`

Return type: boolean

Param: -

Description: It check if there is `tokoDoto` localStorage or not

Example:

```javascript
let status = checkLocalStorage();
console.log(status); // It will return true or false
```

#### `initializeLocalStorage()`

Return type: void

Param: -

Description: It initialize the localStorage with the default value (see above for the default value)

Example:

```javascript
initializeLocalStorage();
```

#### `setLocalStorage(objectData)`

Return type: void

Param: object

Description: It takes an object that will replace the localStorage with the corresponding parameter

Example:

```javascript
let newObject = {
  isLogin: true,
  userData: {
    userID: 'andreirawan',
  },
};

setLocalStorage(newObject);
// Notice you don't need to parse it? This helper method already parse it for you!
```

#### `removeLocalStorage()`

Return type: void

Param: -

Description: It will remove the localStorage

Example:

```javascript
removeLocalStorage();
```

#### `getLocalStorage()`

Return type: object

Param: -

Description: It will return the localStorage data

Example:

```javascript
let tokoDoto = getLocalStorage();
console.log(tokoDoto);
// It will print an object from localStorage with tokoDoto key
```

---
