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

/* forms/fields/elements/elements.html.twig */
class __TwigTemplate_b01a7cb26e57507640e06549b60d6b028125a0a89d436e696d776a79f8cb3f99 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'global_attributes' => [$this, 'block_global_attributes'],
            'field' => [$this, 'block_field'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/fields/select/select.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 2
        $context["field"] = twig_array_merge(($context["field"] ?? null), ["autocomplete" => "off"]);
        // line 4
        if ( !$this->getAttribute(($context["grav"] ?? null), "admin", [], "any", true, true)) {
        }
        // line 1
        $this->parent = $this->loadTemplate("forms/fields/select/select.html.twig", "forms/fields/elements/elements.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_global_attributes($context, array $blocks = [])
    {
        // line 9
        echo "  data-grav-elements=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "name", []), "html", null, true);
        echo "\"
  ";
        // line 10
        $this->displayParentBlock("global_attributes", $context, $blocks);
        echo "
";
    }

    // line 13
    public function block_field($context, array $blocks = [])
    {
        // line 14
        echo "  ";
        $this->displayParentBlock("field", $context, $blocks);
        echo "
  ";
        // line 15
        $context["parent_name"] = $this->getAttribute(($context["field"] ?? null), "name", []);
        // line 16
        echo "  ";
        $context["parent_value"] = ($context["value"] ?? null);
        // line 17
        echo "  ";
        if (twig_length_filter($this->env, ($context["fields"] ?? null))) {
            // line 18
            echo "    ";
            $this->loadTemplate("forms/default/fields.html.twig", "forms/fields/elements/elements.html.twig", 18)->display(twig_array_merge($context, ["name" => ($context["parent_name"] ?? null), "fields" => $this->getAttribute(($context["field"] ?? null), "fields", [])]));
            // line 19
            echo "  ";
        }
    }

    public function getTemplateName()
    {
        return "forms/fields/elements/elements.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 19,  76 => 18,  73 => 17,  70 => 16,  68 => 15,  63 => 14,  60 => 13,  54 => 10,  49 => 9,  46 => 8,  41 => 1,  38 => 4,  36 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"forms/fields/select/select.html.twig\" %}
{% set field = field|merge({ autocomplete: 'off' }) %}

{% if grav.admin is not defined %}
{# load some frontend CSS/JS #}
{% endif %}

{% block global_attributes %}
  data-grav-elements=\"{{ field.name }}\"
  {{ parent() }}
{% endblock %}

{% block field %}
  {{ parent() }}
  {% set parent_name = field.name %}
  {% set parent_value = value %}
  {% if fields|length %}
    {% include 'forms/default/fields.html.twig' with {name: parent_name, fields: field.fields} %}
  {% endif %}
{% endblock %}
", "forms/fields/elements/elements.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/elements/elements.html.twig");
    }
}
