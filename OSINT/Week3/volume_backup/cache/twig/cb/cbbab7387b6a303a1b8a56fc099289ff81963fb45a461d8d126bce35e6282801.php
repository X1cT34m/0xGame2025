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

/* forms/fields/colorpicker/colorpicker.html.twig */
class __TwigTemplate_56af7f7823aae8865354f9eb230a26780f46412740603923086a5132ea0acdc7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'input' => [$this, 'block_input'],
            'input_attributes' => [$this, 'block_input_attributes'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "forms/field.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 3
        $context["pattern"] = "^#([a-fA-F0-9]{6})|(rgba\\(\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*(0|[1-9]\\d?|1\\d\\d?|2[0-4]\\d|25[0-5])\\s*,\\s*((0.[0-9]+)|(1.00)|1.0|1)\\s*\\))\$";
        // line 1
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/colorpicker/colorpicker.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_input($context, array $blocks = [])
    {
        // line 6
        echo "<div class=\"form-list-wrapper ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "size", []), "html", null, true);
        echo "\" data-type=\"collection\">
    <div class=\"g-colorpicker\">
        ";
        // line 8
        $context["input_value"] = ((twig_test_iterable(($context["value"] ?? null))) ? (twig_join_filter(($context["value"] ?? null), ",")) : ($this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->stringFilter(($context["value"] ?? null))));
        // line 9
        echo "        <input
                data-grav-colorpicker=\"";
        // line 10
        echo twig_escape_filter($this->env, twig_jsonencode_filter(["update" => ".g-colorpicker-preview-wrap .g-colorpicker-preview"]), "html_attr");
        echo "\"
                ";
        // line 12
        echo "                name=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->fieldNameFilter((($context["scope"] ?? null) . $this->getAttribute(($context["field"] ?? null), "name", []))), "html", null, true);
        echo "\"
                value=\"";
        // line 13
        echo twig_escape_filter($this->env, ($context["input_value"] ?? null), "html", null, true);
        echo "\"
                type=\"text\"
                ";
        // line 16
        echo "                ";
        $this->displayBlock('input_attributes', $context, $blocks);
        // line 31
        echo "        />
        <div class=\"g-colorpicker-preview-wrap\">
            <div class=\"g-colorpicker-preview\" style=\"background-color: ";
        // line 33
        echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
        echo "\"></div>
        </div>
    </div>
</div>
";
    }

    // line 16
    public function block_input_attributes($context, array $blocks = [])
    {
        // line 17
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "classes", [], "any", true, true)) {
            echo "class=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
            echo "\" ";
        }
        // line 18
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "id", [], "any", true, true)) {
            echo "id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "id", []), "html", null, true);
            echo "\" ";
        }
        // line 19
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "style", [], "any", true, true)) {
            echo "style=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "style", []), "html", null, true);
            echo "\" ";
        }
        // line 20
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "disabled", [])) {
            echo "disabled=\"disabled\"";
        }
        // line 21
        echo "                    ";
        if ($this->getAttribute(($context["field"] ?? null), "placeholder", [])) {
            echo "placeholder=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "placeholder", []), "html", null, true);
            echo "\"";
        }
        // line 22
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autofocus", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "autofocus=\"autofocus\"";
        }
        // line 23
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "novalidate", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "novalidate=\"novalidate\"";
        }
        // line 24
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "readonly", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "readonly=\"readonly\"";
        }
        // line 25
        echo "                    ";
        if (twig_in_filter($this->getAttribute(($context["field"] ?? null), "autocomplete", []), [0 => "on", 1 => "off"])) {
            echo "autocomplete=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "autocomplete", []), "html", null, true);
            echo "\"";
        }
        // line 26
        echo "                    ";
        if (twig_in_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "required", []), [0 => "on", 1 => "true", 2 => 1])) {
            echo "required=\"required\"";
        }
        // line 27
        echo "                    pattern=\"";
        echo (($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", [], "any", false, true), "pattern", [], "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", [], "any", false, true), "pattern", []), ($context["pattern"] ?? null))) : (($context["pattern"] ?? null)));
        echo "\"
                    ";
        // line 28
        if ($this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "message", [])) {
            echo "title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute($this->getAttribute(($context["field"] ?? null), "validate", []), "message", [])), "html", null, true);
            echo "\"
                    ";
        } elseif ($this->getAttribute(        // line 29
($context["field"] ?? null), "title", [], "any", true, true)) {
            echo "title=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "title", [])), "html", null, true);
            echo "\" ";
        }
        // line 30
        echo "                ";
    }

    public function getTemplateName()
    {
        return "forms/fields/colorpicker/colorpicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  167 => 30,  161 => 29,  155 => 28,  150 => 27,  145 => 26,  138 => 25,  133 => 24,  128 => 23,  123 => 22,  116 => 21,  111 => 20,  104 => 19,  97 => 18,  90 => 17,  87 => 16,  78 => 33,  74 => 31,  71 => 16,  66 => 13,  61 => 12,  57 => 10,  54 => 9,  52 => 8,  46 => 6,  43 => 5,  38 => 1,  36 => 3,  30 => 1,);
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

{% set pattern = '^#([a-fA-F0-9]{6})|(rgba\\\\(\\\\s*(0|[1-9]\\\\d?|1\\\\d\\\\d?|2[0-4]\\\\d|25[0-5])\\\\s*,\\\\s*(0|[1-9]\\\\d?|1\\\\d\\\\d?|2[0-4]\\\\d|25[0-5])\\\\s*,\\\\s*(0|[1-9]\\\\d?|1\\\\d\\\\d?|2[0-4]\\\\d|25[0-5])\\\\s*,\\\\s*((0.[0-9]+)|(1.00)|1.0|1)\\\\s*\\\\))\$' %}

{% block input %}
<div class=\"form-list-wrapper {{ field.size }}\" data-type=\"collection\">
    <div class=\"g-colorpicker\">
        {% set input_value = value is iterable ? value|join(',') : value|string %}
        <input
                data-grav-colorpicker=\"{{ {update: '.g-colorpicker-preview-wrap .g-colorpicker-preview'}|json_encode|e('html_attr') }}\"
                {# required attribute structures #}
                name=\"{{ (scope ~ field.name)|fieldName }}\"
                value=\"{{ input_value }}\"
                type=\"text\"
                {# input attribute structures #}
                {% block input_attributes %}
                    {% if field.classes is defined %}class=\"{{ field.classes }}\" {% endif %}
                    {% if field.id is defined %}id=\"{{ field.id }}\" {% endif %}
                    {% if field.style is defined %}style=\"{{ field.style }}\" {% endif %}
                    {% if field.disabled %}disabled=\"disabled\"{% endif %}
                    {% if field.placeholder %}placeholder=\"{{ field.placeholder }}\"{% endif %}
                    {% if field.autofocus in ['on', 'true', 1] %}autofocus=\"autofocus\"{% endif %}
                    {% if field.novalidate in ['on', 'true', 1] %}novalidate=\"novalidate\"{% endif %}
                    {% if field.readonly in ['on', 'true', 1] %}readonly=\"readonly\"{% endif %}
                    {% if field.autocomplete in ['on', 'off'] %}autocomplete=\"{{ field.autocomplete }}\"{% endif %}
                    {% if field.validate.required in ['on', 'true', 1] %}required=\"required\"{% endif %}
                    pattern=\"{{ field.validate.pattern|default(pattern)|raw }}\"
                    {% if field.validate.message %}title=\"{{ field.validate.message|t }}\"
                    {% elseif field.title is defined %}title=\"{{ field.title|t }}\" {% endif %}
                {% endblock %}
        />
        <div class=\"g-colorpicker-preview-wrap\">
            <div class=\"g-colorpicker-preview\" style=\"background-color: {{ value }}\"></div>
        </div>
    </div>
</div>
{% endblock %}

", "forms/fields/colorpicker/colorpicker.html.twig", "/var/www/html/user/plugins/admin/themes/grav/templates/forms/fields/colorpicker/colorpicker.html.twig");
    }
}
