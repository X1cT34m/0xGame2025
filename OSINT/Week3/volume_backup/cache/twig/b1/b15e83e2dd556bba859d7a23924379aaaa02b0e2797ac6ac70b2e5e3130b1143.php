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

/* forms/fields/spacer/spacer.html.twig */
class __TwigTemplate_78b429fcdbd75932266c1052e1193add8b551434d5dd120bdeda3486f73fdb78 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("forms/field.html.twig", "forms/fields/spacer/spacer.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_field($context, array $blocks = [])
    {
        // line 4
        echo "<div class=\"form-field form-spacer ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["field"] ?? null), "classes", []), "html", null, true);
        echo "\">
    ";
        // line 5
        if ($this->getAttribute(($context["field"] ?? null), "title", [])) {
            // line 6
            echo "        <";
            echo twig_escape_filter($this->env, ((array_key_exists("title_type", $context)) ? (_twig_default_filter(($context["title_type"] ?? null), "h3")) : ("h3")), "html", null, true);
            echo ">";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "title", []));
            echo "</ ";
            echo twig_escape_filter($this->env, ((array_key_exists("title_type", $context)) ? (_twig_default_filter(($context["title_type"] ?? null), "h3")) : ("h3")), "html", null, true);
            echo ">
    ";
        }
        // line 8
        echo "
    ";
        // line 9
        if ($this->getAttribute(($context["field"] ?? null), "markdown", [])) {
            // line 10
            echo "        <p>";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->markdownFunction($context, $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "text", [])));
            echo "</p>
    ";
        } else {
            // line 12
            echo "        <p>";
            echo $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->translate($this->env, $this->getAttribute(($context["field"] ?? null), "text", []));
            echo "</p>
    ";
        }
        // line 14
        echo "
    ";
        // line 15
        if ($this->getAttribute(($context["field"] ?? null), "underline", [])) {
            // line 16
            echo "    <hr />
    ";
        }
        // line 18
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "forms/fields/spacer/spacer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  81 => 16,  79 => 15,  76 => 14,  70 => 12,  64 => 10,  62 => 9,  59 => 8,  49 => 6,  47 => 5,  42 => 4,  39 => 3,  29 => 1,);
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
<div class=\"form-field form-spacer {{ field.classes }}\">
    {% if field.title %}
        <{{ title_type|default('h3') }}>{{- field.title|t|raw -}}</ {{ title_type|default('h3') }}>
    {% endif %}

    {% if field.markdown %}
        <p>{{- field.text|t|markdown|raw -}}</p>
    {% else %}
        <p>{{- field.text|t|raw -}}</p>
    {% endif %}

    {% if field.underline %}
    <hr />
    {% endif %}
</div>
{% endblock %}
", "forms/fields/spacer/spacer.html.twig", "/var/www/html/user/plugins/form/templates/forms/fields/spacer/spacer.html.twig");
    }
}
