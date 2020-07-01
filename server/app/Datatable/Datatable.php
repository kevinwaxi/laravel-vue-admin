<?php

namespace App\Datatable;

class Datatable
{
    protected $query;
    protected $filterableColumns;
    protected $perPage = 25;

    public function __construct($query, $filterableColumns = [])
    {
        $this->query = $query;
        $this->filterableColumns = $filterableColumns;
    }

    public function filterColumns($filterableColumns)
    {
        $this->filterableColumns = $filterableColumns;
    }

    public function query()
    {
        if (request()->has('sort_by') && request()->sort_by != null)
            if (request()->has('sort_desc') && request()->sort_desc == 1)
                $this->query->orderByDesc(request()->sort_by);
            else
                $this->query->orderBy(request()->sort_by);

        if (request()->has('filter') && request()->filter != null && ! empty($this->filterableColumns))
            foreach ($this->filterableColumns as $filterableColumn)
                $this->query->orWhere($filterableColumn, 'like', '%' . request()->filter . '%');

        return $this->query;
    }

    public function get()
    {
        if (request()->has('per_page') && request()->per_page != null)
            $this->perPage = request()->per_page;

        return $this->query()->paginate($this->perPage);
    }
}