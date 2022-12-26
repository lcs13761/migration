<?php

namespace Luke\Types;


trait SubjectAction
{
    /**
     * Undocumented function
     *
     * @return static
     */
    public function primaryKey(): static
    {
        $this->setQueryValueSubject("PRIMARY KEY");

        return $this;
    }

    /**
     * @param mixed|null $value
     * @return $this
     */
    public function default(mixed $value = null): static
    {
        $this->setQueryValueSubject("DEFAULT " . $value);

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function notNull(): static
    {
        $this->setQueryValueSubject(" NOT NULL ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function unique(): static
    {
        $this->setQueryValueSubject(' UNIQUE ');

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function unsigned(): static
    {
        $this->setQueryValueSubject(' unsigned ');

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function foreignKey(string $name): static
    {
        $rand = rand();
        $constrain = "CONSTRAINT  `" . $name . "_foreignKey_" . $rand . "` ";
        $foreignKey = "FOREIGN KEY (`" . $name . "`)";
        $this->setQueryValueSubject($constrain . $foreignKey);
        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @param string $row
     * @return static
     */
    public function references(string $name, string $row = 'id'): static
    {
        $this->setQueryValueSubject(" REFERENCES `$name` (`$row`)");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function cascadeDelete(): static
    {
        $this->setQueryValueSubject(" ON DELETE CASCADE ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function cascadeUpdate(): static
    {
        $this->setQueryValueSubject(" ON UPDATE CASCADE ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function cascade(): static
    {
        $this->cascadeDelete();
        $this->cascadeUpdate();

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function noAction(): static
    {
        $this->noActionDelete();
        $this->noActionUpdate();

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function noActionDelete(): static
    {
        $this->setQueryValueSubject(" ON DELETE NO ACTION ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function noActionUpdate(): static
    {
        $this->setQueryValueSubject(" ON UPDATE NO ACTION ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function autIncrement(): static
    {
        $this->setQueryValueSubject(" AUTO_INCREMENT ");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function timestamps(): static
    {
        $this->createAt();

        $this->updateAt();

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function createAt(): static
    {
        $this->timestamp('created_at')->notNull()->default('CURRENT_TIMESTAMP');

        return $this;
    }

    /**
     * Undocumented function
     *
     * @return static
     */
    public function updateAt(): static
    {
        $this->timestamp('updated_at')->notNull()->default('CURRENT_TIMESTAMP  ON UPDATE CURRENT_TIMESTAMP');

        return $this;
    }

    
    private function setQueryValueSubject($value)
    {
        $this->query .= $value;
    }
}
