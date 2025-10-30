<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forms/fields/element/element.html.twig */
class __TwigTemplate_4aa60d26bb76f74cf85edcb6078e12d9e0fe9ca2b3d963ecf1b268899a387418 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/element/element.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        echo "  ";
        $context["parent"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldParentFilter(($context["parent_name"] ?? null));
        // line 5
        echo "  ";
        $context["plain_name"] = $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->stringFilter(((($this->getAttribute(($context["field"] ?? null), "plain_name", [], "any", true, true) &&  !(null === $this->getAttribute(($context["field"] ?? null), "plain_name", [])))) ? ($this->getAttribute(($context["field"] ?? null), "plain_name", [])) : ($this->getAttribute(($context["field"] ?? null), "name", []))));
        // line 6
        echo "  ";
        $context["name"] = ((($context["parent"] ?? null) . ".") . ($context["plain_name"] ?? null));
        // line 7
        echo "  ";
        if ($this->getAttribute(($context["field"] ?? null), "field", [])) {
            // line 8
            echo "    ";
            $context["fields"] = $this->env->getExtension('Grav\Plugin\Form\TwigExtension')->prepareFormFields($context, [($context["name"] ?? null) => $this->getAttribute(($context["field"] ?? null), "field", [])]);
            // line 9
            echo "  ";
        } else {
            // line 10
            echo "    ";
            $context["fields"] = $this->env->getExtension('Grav\Plugin\Form\TwigExtension')->prepareFormFields($context, $this->getAttribute(($context["field"] ?? null), "fields", []), ($context["name"] ?? null));
            // line 11
            echo "  ";
        }
        // line 12
        echo "
  ";
        // line 13
        $this->loadTemplate("forms/fields/element/element.html.twig", "forms/fields/element/element.html.twig", 13, "2108826588")->display(twig_array_merge($context, ["name" => ($context["name"] ?? null), "fields" => ($context["fields"] ?? null)]));
    }

    public function getTemplateName()
    {
        return "forms/fields/element/element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 13,  66 => 12,  63 => 11,  60 => 10,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% block field %}
  {% set parent = parent_name|parent_field %}
  {% set plain_name = (field.plain_name ?? field.name)|string %}
  {% set name = parent ~ '.' ~ plain_name %}
  {% if field.field %}
    {% set fields = prepare_form_fields({(name): field.field}) %}
  {% else %}
    {% set fields = prepare_form_fields(field.fields, name) %}
  {% endif %}

  {% embed 'forms/default/fields.html.twig' with {name: name, fields: fields} %}
    {% set initial_state = plain_name is not same as (parent_value|string) ? 'display: none;' %}
    {% block outer_markup_field_open %}
      <div id=\"{{ parent_name ~ '__' ~ plain_name }}\" class=\"form-element\" style=\"{{ initial_state }}\">
    {% endblock %}

    {% block outer_markup_field_close %}
        </div>
    {% endblock %}
  {% endembed %}
{% endblock %}
", "forms/fields/element/element.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/element/element.html.twig");
    }
}


/* forms/fields/element/element.html.twig */
class __TwigTemplate_4aa60d26bb76f74cf85edcb6078e12d9e0fe9ca2b3d963ecf1b268899a387418___2108826588 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'outer_markup_field_open' => [$this, 'block_outer_markup_field_open'],
            'outer_markup_field_close' => [$this, 'block_outer_markup_field_close'],
        ];
    }

    protected function doGetParent(array $context)
    {
        return "forms/default/fields.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 14
        $context["initial_state"] = (( !(($context["plain_name"] ?? null) === $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->stringFilter(($context["parent_value"] ?? null)))) ? ("display: none;") : (""));
        // line 13
        $this->parent = $this->loadTemplate("forms/default/fields.html.twig", "forms/fields/element/element.html.twig", 13);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 15
    public function block_outer_markup_field_open($context, array $blocks = [])
    {
        // line 16
        echo "      <div id=\"";
        echo twig_escape_filter($this->env, ((($context["parent_name"] ?? null) . "__") . ($context["plain_name"] ?? null)), "html", null, true);
        echo "\" class=\"form-element\" style=\"";
        echo twig_escape_filter($this->env, ($context["initial_state"] ?? null), "html", null, true);
        echo "\">
    ";
    }

    // line 19
    public function block_outer_markup_field_close($context, array $blocks = [])
    {
        // line 20
        echo "        </div>
    ";
    }

    public function getTemplateName()
    {
        return "forms/fields/element/element.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  168 => 20,  165 => 19,  156 => 16,  153 => 15,  148 => 13,  146 => 14,  69 => 13,  66 => 12,  63 => 11,  60 => 10,  57 => 9,  54 => 8,  51 => 7,  48 => 6,  45 => 5,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/field.html.twig\" %}

{% block field %}
  {% set parent = parent_name|parent_field %}
  {% set plain_name = (field.plain_name ?? field.name)|string %}
  {% set name = parent ~ '.' ~ plain_name %}
  {% if field.field %}
    {% set fields = prepare_form_fields({(name): field.field}) %}
  {% else %}
    {% set fields = prepare_form_fields(field.fields, name) %}
  {% endif %}

  {% embed 'forms/default/fields.html.twig' with {name: name, fields: fields} %}
    {% set initial_state = plain_name is not same as (parent_value|string) ? 'display: none;' %}
    {% block outer_markup_field_open %}
      <div id=\"{{ parent_name ~ '__' ~ plain_name }}\" class=\"form-element\" style=\"{{ initial_state }}\">
    {% endblock %}

    {% block outer_markup_field_close %}
        </div>
    {% endblock %}
  {% endembed %}
{% endblock %}
", "forms/fields/element/element.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/element/element.html.twig");
    }
}
