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

/* flex-objects/types/default/buttons/languages.html.twig */
class __TwigTemplate_2eeba96018887381d8e2ec16705171b7680861f43e08376eb3929d2a9ad9aadc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<div id=\"titlebar-languages\" class=\"button-group\">
    <button type=\"button\" class=\"button disabled\">
        <i class=\"fa fa-flag-o\"></i>
        ";
        // line 4
        echo twig_escape_filter($this->env, ((($this->getAttribute(($context["all_languages"] ?? null), ($context["language"] ?? null), [], "array", true, true) &&  !(null === $this->getAttribute(($context["all_languages"] ?? null), ($context["language"] ?? null), [], "array")))) ? ($this->getAttribute(($context["all_languages"] ?? null), ($context["language"] ?? null), [], "array")) : (($context["language"] ?? null))), "html", null, true);
        echo "
    </button>
    ";
        // line 6
        if ((twig_length_filter($this->env, ($context["admin_languages"] ?? null)) > $this->env->getExtension('Grav\Common\Twig\Extension\GravExtension')->intFilter(twig_in_filter(($context["language"] ?? null), ($context["admin_languages"] ?? null))))) {
            // line 7
            echo "        <button type=\"button\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\">
            <i class=\"fa fa-caret-down\"></i>
        </button>
        <ul class=\"dropdown-menu language-switcher\">
            ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["admin_languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["lang_code"]) {
                // line 12
                echo "                ";
                if (($context["lang_code"] != ($context["language"] ?? null))) {
                    // line 13
                    echo "                    <li><a href=\"";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->adminRouteFunc($this->getAttribute(($context["route"] ?? null), "getRoute", [0 => 1], "method"), $context["lang_code"]), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, ((($this->getAttribute(($context["all_languages"] ?? null), $context["lang_code"], [], "array", true, true) &&  !(null === $this->getAttribute(($context["all_languages"] ?? null), $context["lang_code"], [], "array")))) ? ($this->getAttribute(($context["all_languages"] ?? null), $context["lang_code"], [], "array")) : ($context["lang_code"])), "html", null, true);
                    echo "</a></li>
                ";
                }
                // line 15
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lang_code'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "        </ul>
    ";
        }
        // line 18
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/buttons/languages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 18,  69 => 16,  63 => 15,  55 => 13,  52 => 12,  48 => 11,  42 => 7,  40 => 6,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<div id=\"titlebar-languages\" class=\"button-group\">
    <button type=\"button\" class=\"button disabled\">
        <i class=\"fa fa-flag-o\"></i>
        {{ all_languages[language] ?? language }}
    </button>
    {%  if admin_languages|length > (language in admin_languages)|int %}
        <button type=\"button\" class=\"button dropdown-toggle\" data-toggle=\"dropdown\">
            <i class=\"fa fa-caret-down\"></i>
        </button>
        <ul class=\"dropdown-menu language-switcher\">
            {% for lang_code in admin_languages %}
                {% if lang_code != language %}
                    <li><a href=\"{{ admin_route(route.getRoute(1), lang_code) }}\">{{ all_languages[lang_code] ?? lang_code }}</a></li>
                {% endif %}
            {% endfor %}
        </ul>
    {% endif %}
</div>
", "flex-objects/types/default/buttons/languages.html.twig", "/var/www/html/user/plugins/flex-objects/admin/templates/flex-objects/types/default/buttons/languages.html.twig");
    }
}
