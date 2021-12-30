<?php

namespace Luke\Migration;



class MethodType implements  IMethodType
{

    private string $query = '';

    public function createRow(): string
    {
        return preg_replace('/\s+/',' ',trim($this->query));
    }

    public function id($type = "int"): static
    {
        if($type == "int"){
            $this->integer('id')->unsigned()->notNull()->primaryKey();
        }else{
            $this->bigint('id')->unsigned()->notNull()->primaryKey();
        }

        return $this;
    }

    public function primaryKey(): static
    {
        $this->query .= "PRIMARY KEY";
        return $this;
    }

    public function string(string $name,int $limit = 255): static
    {
        $this->query = "`$name` varchar(" . $limit . ")";
        return $this;
    }

    public function integer(string $name): static
    {
        $this->query = "`$name` INT";
        return $this;
    }

    public function timestamp(string $name): static
    {
        $this->query =  "`$name` timestamp";
        return $this;
    }

    public function bigInt(string $name): static
    {
        $this->query =  "`$name` bigInt";
        return $this;
    }

    public function datetime(string $name): static
    {
        $this->query = "`$name` datetime";
        return $this;
    }

    public function createAt(): static
    {
        $this->timestamp('created_at')->notNull()->default('CURRENT_TIMESTAMP');
        return $this;
    }

    public function updateAt(): static
    {
        $this->timestamp('updated_at')->notNull()->default('CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP');
        return $this;
    }

    /**
     * @param mixed|null $value
     * @return $this
     */
    public function default(mixed $value = null): static
    {
        $this->query .= "DEFAULT " . $value;
        return $this;
    }

    public function notNull(): static
    {
        $this->query .= " NOT NULL ";
        return $this;
    }

    public function unique(): static
    {
        $this->query .= ' UNIQUE ';
        return $this;
    }

    public function unsigned(): static
    {
        $this->query .= ' unsigned ';
        return $this;
    }

    public function foreignKey(string $name): static
    {
        $rand = rand();
        $constrain = "CONSTRAINT  `".$name ."_foreignKey_" .$rand . "` ";
        $foreignKey = "FOREIGN KEY (`" . $name . "`)";
        $this->query = $constrain . $foreignKey;
        return $this;
    }

    public function references(string $name,string $row = 'id'): static
    {
        $this->query .= " REFERENCES `$name` (`$row`)";
        return $this;
    }

    public function cascadeDelete(): static
    {
        $this->query .= " ON DELETE CASCADE ";
        return $this;
    }

    public function cascadeUpdate(): static
    {
        $this->query .= " ON UPDATE CASCADE ";
        return $this;
    }

    public function cascade(): static
    {
        $this->cascadeDelete();
        $this->cascadeUpdate();
        return $this;
    }

    public function noAction(): static
    {
        $this->noActionDelete();
        $this->noActionUpdate();
        return $this;
    }

    public function noActionDelete(): static
    {
        $this->query .= " ON DELETE NO ACTION ";
        return $this;
    }

    public function noActionUpdate(): static
    {
        $this->query .= " ON UPDATE NO ACTION ";
        return $this;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function float(string $name)
    {
        $this->query = "`$name` FLOAT";
        return $this;
    }

    public function text(string $name)
    {
        $this->query = "`$name` TEXT";
        return $this;
    }

    public function autIncrement()
    {
        $this->query .= " AUTO_INCREMENT ";
        return $this;
    }
}