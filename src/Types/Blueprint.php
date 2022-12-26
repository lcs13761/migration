<?php

namespace Luke\Types;


class Blueprint implements IBlueprint
{
    use SubjectAction;

    private string $query = '';

    /**
     * Undocumented function
     *
     * @return static
     */
    public function id(): static
    {
        $this->bigint('id')->unsigned()->notNull()->primaryKey();

        return $this;
    }

    public function getQuery()
    {
        $value = ltrim($this->query,$this->query[0]);

        return $value;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @param integer $limit
     * @return static
     */
    public function string(string $name, int $limit = 255): static
    {
        $this->setValueTypeRow($name, "varchar(" . $limit . ")");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function integer(string $name): static
    {
        $this->setValueTypeRow($name, "INT");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function timestamp(string $name): static
    {
        $this->setValueTypeRow($name, "timestamp");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function bigInt(string $name): static
    {
        $this->setValueTypeRow($name, "bigInt");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function datetime(string $name): static
    {
        $this->setValueTypeRow($name, "datetime");

        return $this;
    }

    /**
     * @param string $name
     * @return static
     */
    public function float(string $name): static
    {
        $this->setValueTypeRow($name, "FLOAT");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function text(string $name): static
    {
        $this->setValueTypeRow($name, "TEXT");

        return $this;
    }

    /**
     * Undocumented function
     *
     * @param string $name
     * @return static
     */
    public function boolean(string $name): static
    {
        $this->setValueTypeRow($name, "BOOLEAN");

        return $this;
    }

    private function setValueTypeRow($value, string $query)
    {
        $this->query .= $value ? ",`$value` $query" : " $query";
    }
}
