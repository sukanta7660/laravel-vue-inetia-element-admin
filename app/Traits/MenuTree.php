<?php

namespace App\Traits;

use App\Exceptions\Menu\InvalidParent;
use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;

trait MenuTree
{
    /**
     * @var Closure
     */
    protected $queryCallback;

    /**
     * Get children of current node.
     *
     * @return HasMany
     */
    public function children() : HasMany
    {
        return $this->hasMany(static::class, $this->getParentColumn());
    }

    /**
     * Get parent of current node.
     *
     * @return BelongsTo
     */
    public function parent() : BelongsTo
    {
        return $this->belongsTo(static::class, $this->getParentColumn());
    }

    /**
     * GET all parents.
     *
     * @return Collection
     */
    public function parents() : Collection
    {
        $parents = collect([]);

        $parent = $this->parent;

        while (!is_null($parent)) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }

    /**
     * @return string
     */
    public function getParentColumn() : string
    {
        if (property_exists($this, 'parentColumn')) {
            return $this->parentColumn;
        }

        return 'parent_id';
    }

    /**
     * @return mixed
     */
    public function getParentKey() : mixed
    {
        return $this->{$this->getParentColumn()};
    }

    /**
     * Set parent column.
     *
     * @param string $column
     */
    public function setParentColumn($column) : void
    {
        $this->parentColumn = $column;
    }

    /**
     * Get title column.
     *
     * @return string
     */
    public function getTitleColumn() : string
    {
        if (property_exists($this, 'titleColumn')) {
            return $this->titleColumn;
        }

        return 'name';
    }

    /**
     * Set title column.
     *
     * @param string $column
     */
    public function setTitleColumn($column) : void
    {
        $this->titleColumn = $column;
    }

    /**
     * Get order column name.
     *
     * @return string
     */
    public function getOrderColumn() : string
    {
        if (property_exists($this, 'orderColumn')) {
            return $this->orderColumn;
        }

        return 'sort';
    }

    /**
     * Set order column.
     *
     * @param string $column
     */
    public function setOrderColumn(string $column) : void
    {
        $this->orderColumn = $column;
    }

    /**
     * @return string
     */
    public function getMenuRelationColumn() : string
    {
        if (property_exists($this, 'menuRelationColumn')) {
            return $this->menuRelationColumn;
        }

        return 'menu_id';
    }

    /**
     * Set menu relation column.
     *
     * @param string $column
     */
    public function setMenuRelationColumn($column) : void
    {
        $this->menuRelationColumn = $column;
    }

    /**
     * Set query callback to model.
     *
     * @param Closure|null $query
     *
     * @return $this
     */
    public function withQuery(Closure $query = null) : static
    {
        $this->queryCallback = $query;

        return $this;
    }

    /**
     * Format data to tree like array.
     *
     * @param $menuId
     * @return array
     */
    public function toTree($menuId) : array
    {
        return $this->buildNestedArray($menuId);
    }

    /**
     * Build Nested array.
     *
     * @param $menuId
     * @param array $nodes
     * @param int $parentId
     *
     * @return array
     */
    protected function buildNestedArray($menuId, array $nodes = [], int $parentId = 0) : array
    {
        $branch = [];

        if (empty($nodes)) {
            $nodes = $this->allNodes($menuId);
        }

        foreach ($nodes as $node) {
            if ($node[$this->getParentColumn()] == $parentId) {
                $children = $this->buildNestedArray($menuId, $nodes, $node[$this->getKeyName()]);

                if ($children) {
                    $node['children'] = $children;
                }

                $branch[] = $node;
            }
        }

        return $branch;
    }

    /**
     * Get all elements.
     *
     * @param $menuId
     * @param null $ignoreItemId
     * @return mixed
     */
    public function allNodes($menuId, $ignoreItemId = null) : mixed
    {
        $self = new static();

        if ($this->queryCallback instanceof Closure) {
            $self = call_user_func($this->queryCallback, $self);
        }


        if ($ignoreItemId) {
            return $self->where($this->getMenuRelationColumn(), $menuId)
                ->where(function ($query) use ($ignoreItemId) {
                    $query->where($this->getParentColumn(), '!=', $ignoreItemId)->orWhereNull($this->getParentColumn());
                })
                ->orderBy($this->getOrderColumn())->get()->toArray();
        }

        return $self->where($this->getMenuRelationColumn(),
            $menuId)->orderBy($this->getOrderColumn())->get()->toArray();
    }

    /**
     * Get options for Select field in form.
     *
     * @param $menuId
     * @param null $ignoreItemId
     * @param Closure|null $closure
     * @return array
     */
    public static function selectOptions($menuId, $ignoreItemId = null, Closure $closure = null) : array
    {
        $options = (new static())->withQuery($closure)->buildSelectOptions($menuId, $ignoreItemId);

        return collect($options)->all();
    }

    /**
     * Build options of select field in form.
     *
     * @param $menuId
     * @param $ignoreItemId
     * @param array $nodes
     * @param int $parentId
     * @param string $prefix
     * @param string $space
     *
     * @return array
     */
    protected function buildSelectOptions(
        $menuId,
        $ignoreItemId,
        array $nodes = [],
        int $parentId = 0,
        string $prefix = '',
        string $space = '&nbsp;'
    ) : array {
        $prefix = $prefix ?: '┝' . $space;

        $options = [];

        if (empty($nodes)) {
            $nodes = $this->allNodes($menuId, $ignoreItemId);
        }

        foreach ($nodes as $index => $node) {
            if ($node[$this->getParentColumn()] == $parentId) {
                $node[$this->getTitleColumn()] = $prefix . $space . $node[$this->getTitleColumn()];

                $childrenPrefix = str_replace('┝', str_repeat($space, 6), $prefix) . '┝' . str_replace(['┝', $space],
                        '', $prefix);

                $children = $this->buildSelectOptions($menuId, null, $nodes, $node[$this->getKeyName()],
                    $childrenPrefix);

                $options[$node[$this->getKeyName()]] = $node[$this->getTitleColumn()];

                if ($children) {
                    $options += $children;
                }
            }
        }

        return $options;
    }

    /**
     * Build the link based on uri
     *
     */
    protected function getLinkAttribute() : array | string
    {
        $uri = trim($this->uri);

        if (str_contains($uri, '<nolink>')) {
            $uri = '';
        }

        if (str_contains($uri, '<admin>')) {
            $uri = str_replace('<admin>', config('admin.prefix', 'admin'), $uri);
        }

        return $uri;
    }


    /**
     * {}
     */
    public function delete()
    {
        $parentColumn = $this->getParentColumn();
        $newParent = $this->$parentColumn ?? null;
        $this->where($this->getParentColumn(), $this->getKey())->update([$this->getParentColumn() => $newParent]);

        return parent::delete();
    }

    public function initializeMenuTree() : void
    {
        $this->appends = array_unique(array_merge($this->appends, ['link']));
    }

    /**
     * {}
     */
    protected static function boot() : void
    {
        parent::boot();

        static::saving(function (Model $branch) {
            $parentColumn = $branch->getParentColumn();

            if (Request::filled($parentColumn) && Request::input($parentColumn) == $branch->getKey()) {
                throw InvalidParent::create();
            }

            return $branch;
        });
    }
}
