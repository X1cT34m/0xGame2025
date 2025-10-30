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

/* flex-objects/types/default/titlebar/configure.html.twig */
class __TwigTemplate_962aee107182fa81f88b20b5ff648d8486f747b93b58a70c22f03b16bec11fd9 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'titlebar' => [$this, 'block_titlebar'],
            'titlebar_button_bar' => [$this, 'block_titlebar_button_bar'],
            'back_button' => [$this, 'block_back_button'],
            'extra_buttons' => [$this, 'block_extra_buttons'],
            'save_button' => [$this, 'block_save_button'],
            'titlebar_title' => [$this, 'block_titlebar_title'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $this->displayBlock('titlebar', $context, $blocks);
    }

    public function block_titlebar($context, array $blocks = [])
    {
        // line 2
        echo "    ";
        $this->displayBlock('titlebar_button_bar', $context, $blocks);
        // line 19
        echo "
    ";
        // line 20
        $this->displayBlock('titlebar_title', $context, $blocks);
        // line 31
        echo "
";
    }

    // line 2
    public function block_titlebar_button_bar($context, array $blocks = [])
    {
        // line 3
        echo "    <div class=\"button-bar\">
        ";
        // line 5
        echo "        ";
        $this->displayBlock('back_button', $context, $blocks);
        // line 8
        echo "
        ";
        // line 9
        $this->displayBlock('extra_buttons', $context, $blocks);
        // line 10
        echo "
        ";
        // line 12
        echo "        ";
        if (($context["can_save"] ?? null)) {
            // line 13
            echo "        ";
            $this->displayBlock('save_button', $context, $blocks);
            // line 16
            echo "        ";
        }
        // line 17
        echo "    </div>
    ";
    }

    // line 5
    public function block_back_button($context, array $blocks = [])
    {
        // line 6
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/back.html.twig"), 1 => "flex-objects/types/default/buttons/back.html.twig"], "flex-objects/types/default/titlebar/configure.html.twig", 6)->display($context);
        // line 7
        echo "        ";
    }

    // line 9
    public function block_extra_buttons($context, array $blocks = [])
    {
    }

    // line 13
    public function block_save_button($context, array $blocks = [])
    {
        // line 14
        echo "            ";
        $this->loadTemplate([0 => (("flex-objects/types/" . ($context["target"] ?? null)) . "/buttons/save.html.twig"), 1 => "flex-objects/types/default/buttons/save.html.twig"], "flex-objects/types/default/titlebar/configure.html.twig", 14)->display(twig_array_merge($context, ["task" => "configure"]));
        // line 15
        echo "        ";
    }

    // line 20
    public function block_titlebar_title($context, array $blocks = [])
    {
        // line 21
        echo "    <h1>
        ";
        // line 22
        if (($context["allowed"] ?? null)) {
            // line 23
            echo "            <i class=\"fa fa-fw fa-cog\"></i>
            ";
            // line 24
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
            echo "
        ";
        } else {
            // line 26
            echo "            <i class=\"fa fa-fw fa-exclamation-triangle\"></i>
            ";
            // line 27
            echo twig_escape_filter($this->env, $this->env->getExtension('Grav\Plugin\Admin\Twig\AdminTwigExtension')->tuFilter("PLUGIN_ADMIN.ERROR"), "html", null, true);
            echo "
        ";
        }
        // line 29
        echo "    </h1>
    ";
    }

    public function getTemplateName()
    {
        return "flex-objects/types/default/titlebar/configure.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  135 => 29,  130 => 27,  127 => 26,  122 => 24,  119 => 23,  117 => 22,  114 => 21,  111 => 20,  107 => 15,  104 => 14,  101 => 13,  96 => 9,  92 => 7,  89 => 6,  86 => 5,  81 => 17,  78 => 16,  75 => 13,  72 => 12,  69 => 10,  67 => 9,  64 => 8,  61 => 5,  58 => 3,  55 => 2,  50 => 31,  48 => 20,  45 => 19,  42 => 2,  36 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% block titlebar %}
    {% block titlebar_button_bar %}
    <div class=\"button-bar\">
        {# BACK #}
        {% block back_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/back.html.twig', 'flex-objects/types/default/buttons/back.html.twig'] %}
        {% endblock back_button %}

        {% block extra_buttons %}{% endblock extra_buttons %}

        {# SAVE #}
        {% if can_save %}
        {% block save_button %}
            {% include ['flex-objects/types/' ~ target ~ '/buttons/save.html.twig', 'flex-objects/types/default/buttons/save.html.twig'] with {task: 'configure'} %}
        {% endblock save_button %}
        {% endif %}
    </div>
    {% endblock titlebar_button_bar %}

    {% block titlebar_title %}
    <h1>
        {% if allowed %}
            <i class=\"fa fa-fw fa-cog\"></i>
            {{ title }}
        {% else %}
            <i class=\"fa fa-fw fa-exclamation-triangle\"></i>
            {{ 'PLUGIN_ADMIN.ERROR'|tu }}
        {% endif %}
    </h1>
    {% endblock titlebar_title %}

{% endblock %}
", "flex-objects/types/default/titlebar/configure.html.twig", "/var/www/html/user/plugins/flex-objects/admin/templates/flex-objects/types/default/titlebar/configure.html.twig");
    }
}
