yii-visitor
===========

visitor design pattern

##Example



##Example 2

Attach behaviour to model

```php

/**
 *
 * @method void accept(VisitorInterface $visitor)
 */
class User extends CActiveRecord {

  ...
  
  public function behaviours() {
    return array(
      'visitor' => array(
        'class' => 'ext.yii-visitor.ElementBehaviour'
      )
    );
  }
  
  ...
  
}

```

Create a visitor

```php

class TinyInformationVisitor implements VisitorInterface {

  public function visit(CModel $model) {
    //  called when method for $model not defined
    echo 'Visit: ' . get_class($model);
  }
  
  public function visitUser(User $user) {
    return array(
      'id' => $user->id,
      'name' => $user->name
    );
  }
}

class MediumInformationVisitor implements VisitorInterface {

  public function visit(CModel $model) {
    //  called when method for $model not defined
    echo 'Visit: ' . get_class($model);
  }
  
  public function visitUser(User $user) {
    return array(
      'id' => $user->id,
      'name' => $user->name,
      'email' => $user->email,
      'role' => $user->role,
      'ip' => $user->ip
    );
  }
}

```

And use it!

```php

$user = User::model()->findByPk(1);

print_r($user->accept(new TinyInformationVisitor()));
print_r($user->accept(new MediumInformationVisitor()));

```

